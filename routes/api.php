<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\EmployeeDetailController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\SalesController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/user', [UserController::class, 'show']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::post('password/reset', [UserController::class, 'forgotPassword']);
});

Route::post('login', [UserController::class, 'auth']);
Route::post('register', [UserController::class, 'store']);
Route::middleware('auth:sanctum', 'admin')->group(function () {
    Route::apiResource('roles', RoleController::class);
});
Route::apiResource('employee-details', EmployeeDetailController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('supplier', SupplierController::class);
Route::apiResource('product', ProductController::class);
Route::apiResource('sales', SalesController::class);
