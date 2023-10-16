<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\employeeTableController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LoginController;


Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'login')->name('login')->middleware('alreadyLoggedIn');
    Route::post('/login-admin', 'loginAdmin')->name('login-admin');
});

Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard')->middleware('isLoggedIn');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forgotpassword', [LoginController::class, 'forgotpassword'])->name('forgotpassword');

Route::get('/verifycode', [LoginController::class, 'enterSecurityCode'])->name('entersecuritycode');;

Route::get('/resetpassword', [LoginController::class, 'resetpassword'])->name('resetpassword');;

Route::get('/leaverequest', [LeaveRequestController::class, 'index']);

// group route that utilizes the same controller class
Route::controller(LeaveRequestController::class)->group(function () {
    Route::get('/leave-request', 'index');
    Route::post('/leave-request/add', 'store');
    Route::get('/leave-request/{id}', 'show');
    Route::post('/leave-request/update', 'update');
});

Route::get('/employeetable', [employeeTableController::class, 'employeeTable']);
Route::post('/employeetable-deactivate/{id}', [employeeTableController::class, 'deactivateUser']);
Route::post('/employee-save', [employeeTableController::class, 'store']);
