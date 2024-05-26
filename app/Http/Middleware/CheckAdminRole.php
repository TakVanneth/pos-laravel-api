<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        // if ($request->is('api/roles')) {
        //     return $next($request);
        // }

        if ($request->isMethod('GET')) {
            return $next($request);
        }

        if ($user && $user->role_id === 1) {
            return $next($request);
        }

        if ($user && $user->role->position === 'admin') {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized'], 403);
    }
}
