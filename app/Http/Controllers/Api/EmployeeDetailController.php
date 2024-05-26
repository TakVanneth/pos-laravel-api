<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeDetailRequest;
use App\Http\Requests\UpdateEmployeeDetailRequest;
use App\Http\Resources\EmployeeDetailResource;
use App\Models\EmployeeDetail;

class EmployeeDetailController extends Controller
{
    public function index()
    {
        return EmployeeDetailResource::collection(EmployeeDetail::with('user')->paginate(10));
    }

    public function store(StoreEmployeeDetailRequest $request)
    {
        $employeeDetail = EmployeeDetail::create($request->validated());
        return response()->json([
            'success' => true,
            'data' => EmployeeDetailResource::make($employeeDetail),
            'message' => 'Employee Detail Created Successfully'
        ], 201);
    }

    public function show($user_id)
    {
        $employeeDetail = EmployeeDetail::with('user')->where('user_id', $user_id)->firstOrFail();
        return EmployeeDetailResource::make($employeeDetail);
    }

    public function update(UpdateEmployeeDetailRequest $request, $user_id)
    {
        $employeeDetail = EmployeeDetail::where('user_id', $user_id)->firstOrFail();
        $employeeDetail->update($request->validated());
        return response()->json([
            'success' => true,
            'data' => EmployeeDetailResource::make($employeeDetail),
            'message' => 'Employee Detail Updated Successfully'
        ]);
    }

    public function destroy($user_id)
    {
        $employeeDetail = EmployeeDetail::where('user_id', $user_id)->firstOrFail();
        $employeeDetail->delete();
        return response()->noContent();
    }
}
