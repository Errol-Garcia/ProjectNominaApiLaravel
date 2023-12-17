<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\SalaryController;
use App\Http\Controllers\Api\V1\AccruedController;
use App\Http\Controllers\Api\V1\SessionController;
use App\Http\Controllers\Api\V1\DiscountController;
use App\Http\Controllers\Api\V1\EmployeeController;
use App\Http\Controllers\Api\V1\DepartmentController;
use App\Http\Controllers\Api\V1\LogPayrollController;
use App\Http\Controllers\Api\V1\log_payrollController;
use App\Http\Controllers\Api\V1\RegisteredPayrollController;
use App\Http\Controllers\Api\V1\Auth\AuthenticationSessionController;
use App\Http\Controllers\Api\V1\Auth\RegisteredUserSessionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::apiResource('v1/registered_payroll', RegisteredPayrollController::class);
Route::apiResource('v1/accrued',AccruedController::class);
Route::apiResource('v1/discount',DiscountController::class);
Route::apiResource('v1/department',DepartmentController::class);
Route::apiResource('v1/employee',EmployeeController::class);
Route::apiResource('v1/payroll',SalaryController::class);
Route::apiResource('v1/log_payroll',LogPayrollController::class);
Route::apiResource('v1/post',PostController::class);
Route::apiResource('v1/user', UserController::class);

route::post('login', [SessionController::class, 'login']);
route::post('register', [SessionController::class, 'register']);
route::post('logout', [SessionController::class, 'logout'])->middleware('auth:sanctum');