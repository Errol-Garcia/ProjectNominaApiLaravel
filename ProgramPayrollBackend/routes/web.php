<?php

use App\Http\Controllers\AccruedController;
use App\Http\Controllers\Auth\AuthenticationSessionController;
use App\Http\Controllers\Auth\RegisteredUserSessionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Log_payrollController;
use App\Http\Controllers\RegisteredPayrollController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('WelcomeAdminView');
// }) -> name('home')->middleware('auth');
// //--------------------------------------
// //Route::get('', function () {

// //ROUTES FINALES
// //Route::get('/',[IndexController::class, 'index'])->name('index');
// //----------------Resources---------------

// Route::resource('registered_payroll', RegisteredPayrollController::class)->middleware('auth');
// Route::resource('accrued',AccruedController::class)->middleware('auth');
// Route::resource('discount',DiscountController::class)->middleware('auth');
// Route::resource('department',DepartmentController::class)->middleware('auth');
// Route::resource('employee',EmployeeController::class)->middleware('auth');
// Route::resource('payroll',SalaryController::class)->middleware('auth');
// Route::resource('logPayroll',Log_payrollController::class)->middleware('auth');
// Route::resource('post',PostController::class)->middleware('auth');
// Route::resource('user', UserController::class)->middleware('auth');
// Route::resource('registeredPayroll', RegisteredPayrollController::class)->middleware('auth');


// Route::get('/PayrollPartial', function () {
//     return view('configuration.employee.EmployeePayrollPartial');
// }) -> name('PayrollPartial');

// Route::get('/log/{sueldos}', [Log_payrollController::class, 'almacenar']) -> name('log');
// Route::get('/statistics', [Log_payrollController::class, 'estadistica']) -> name('estadistica');
// Route::post('/search', [RegisteredPayrollController::class, 'create'])-> name('search');


// Route::get('/login', [AuthenticationSessionController::class, 'create'])->name('login');
// Route::post('/login', [AuthenticationSessionController::class, 'store'])->name('start');
// Route::post('/logout', [AuthenticationSessionController::class, 'destroy'])->name('logout');

// Route::get('/register', [RegisteredUserSessionController::class, 'create'])->name('register');
// Route::post('/register', [RegisteredUserSessionController::class, 'store'])->name('save');