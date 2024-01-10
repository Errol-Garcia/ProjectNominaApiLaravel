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
//     return view('auth.Login');
// }) -> name('loginn');

Route::get('/Inicio', [IndexController::class, 'index'])->name('home');
//--------------------------------------
//Route::get('', function () {

//ROUTES FINALES
//Route::get('/',[IndexController::class, 'index'])->name('index');
//----------------Resources---------------

Route::resource('registered_payroll',RegisteredPayrollController::class);
Route::resource('accrued',AccruedController::class);
Route::resource('discount',DiscountController::class);
Route::resource('department',DepartmentController::class);
Route::resource('employee',EmployeeController::class);
Route::resource('payroll',SalaryController::class);
Route::resource('logPayroll',Log_payrollController::class);
Route::resource('post',PostController::class);
Route::resource('user', UserController::class);
Route::resource('registeredPayroll', RegisteredPayrollController::class);


Route::get('/PayrollPartial', function () {
    return view('configuration.employee.EmployeePayrollPartial',['msj'=>null]);
}) -> name('PayrollPartial');

Route::get('/log/{sueldos}', [Log_payrollController::class, 'almacenar']) -> name('log');
Route::get('/statistics', [Log_payrollController::class, 'estadistica']) -> name('estadistica');
Route::post('/search', [RegisteredPayrollController::class, 'create'])-> name('search');


Route::get('/', [AuthenticationSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticationSessionController::class, 'store'])->name('start');
Route::post('/logout', [AuthenticationSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserSessionController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserSessionController::class, 'store'])->name('save');