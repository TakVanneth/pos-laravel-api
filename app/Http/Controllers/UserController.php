<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AuthUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index() {
        $users = User::with('role')->get();
        return UserResource::collection($users);
    }
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
        ]);

        // Load the role relationship
        $user->load('role');

        return response()->json([
            'message' => 'Account has been created successfully.',
            'user' => new UserResource($user),
        ]);
    }

    public function auth(AuthUserRequest $request)
    {
        if($request->validated()) {
            $user = User::whereEmail($request->email)->first();
            if(!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'error' => 'These credentials do not match any of our records.'
                ]);
            }else {
                return response()->json([
                    'user' => $user,
                    'message' => 'Logged in successfully.',
                    'currentToken' => $user->createToken('new_user')->plainTextToken
                ]);
            }
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logged out successfully.'
        ]);
    }
    public function show(Request $request)
    {
        $user = Auth::user()->load('role');
        return response()->json([
            'user' => new UserResource($user),
            'currentToken' => $request->bearerToken()
        ]);
    }
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        // Verify old password if provided
        if ($request->filled('password') && !Hash::check($request->old_password, $user->password)) {
            return response()->json(['error' => 'Old password does not match.'], 422);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            // 'password' => Hash::make($request->password), // Only if you allow password change
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        ]);

        // Load the updated role relationship
        $user->load('role');

        return response()->json([
            'message' => 'User information has been updated successfully.',
            'user' => new UserResource($user),
        ]);
    }
}
