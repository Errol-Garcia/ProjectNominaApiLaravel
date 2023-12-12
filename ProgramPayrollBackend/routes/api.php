<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\RegisteredPayrollController;
use App\Http\Controllers\Api\V1\AccruedController;
use App\Http\Controllers\Api\V1\DiscountController;
use App\Http\Controllers\Api\V1\DepartmentController;
use App\Http\Controllers\Api\V1\EmployeeController;
use App\Http\Controllers\Api\V1\SalaryController;
use App\Http\Controllers\Api\V1\log_payrollController;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\UserController;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
/*
Route::apiResource('v1/registered_payroll', RegisteredPayrollController::class)->middleware('auth');
Route::apiResource('v1/accrued',AccruedController::class)->middleware('auth');
Route::apiResource('v1/discount',DiscountController::class)->middleware('auth');
Route::apiResource('v1/department',DepartmentController::class)->middleware('auth');
Route::apiResource('v1/employee',EmployeeController::class)->middleware('auth');
Route::apiResource('v1/payroll',SalaryController::class)->middleware('auth');
Route::apiResource('v1/logPayroll',Log_payrollController::class)->middleware('auth');
Route::apiResource('v1/post',PostController::class)->middleware('auth');
Route::apiResource('v1/user', UserController::class)->middleware('auth');
Route::apiResource('v1/registeredPayroll', RegisteredPayrollController::class)->middleware('auth');*/
Route::apiResource('v1/registered_payroll', RegisteredPayrollController::class);
Route::apiResource('v1/accrued',AccruedController::class);
Route::apiResource('v1/discount',DiscountController::class);
Route::apiResource('v1/department',DepartmentController::class);
Route::apiResource('v1/employee',EmployeeController::class);
Route::apiResource('v1/payroll',SalaryController::class);
Route::apiResource('v1/logPayroll',Log_payrollController::class);
Route::apiResource('v1/post',PostController::class);
Route::apiResource('v1/user', UserController::class);
Route::apiResource('v1/registeredPayroll', RegisteredPayrollController::class);

// Route::get('/PayrollPartial', function () {
//     return response()->json(['view' => 'configuration.employee.EmployeePayrollPartial']);
// })->name('PayrollPartial');

// Route::get('/log/{sueldos}', [Log_payrollController::class, 'almacenar'])->name('log');
// Route::get('/statistics', [Log_payrollController::class, 'estadistica'])->name('estadistica');
// Route::post('/search', [RegisteredPayrollController::class, 'create'])->name('search');

// Route::get('/login', [AuthenticationSessionController::class, 'create'])->name('login');
// Route::post('/login', [AuthenticationSessionController::class, 'store'])->name('start');
// Route::post('/logout', [AuthenticationSessionController::class, 'destroy'])->name('logout');

// Route::get('/register', [RegisteredUserSessionController::class, 'create'])->name('register');
// Route::post('/register', [RegisteredUserSessionController::class, 'store'])->name('save');