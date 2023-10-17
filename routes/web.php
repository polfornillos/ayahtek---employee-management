<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\employeeTableController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;


Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'login')->name('login')->middleware('alreadyLoggedIn');
    Route::post('/', 'loginAdmin')->name('login-admin');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('/forgotpassword', 'forgotpassword')->name('forgotpassword');
    Route::post('/forgotpassword', 'forgotpasswordPost')->name('forgotpasswordPost');
    // Route::get('/verifycode', 'enterSecurityCode')->name('entersecuritycode');;
    Route::get('/resetpassword{token}', 'resetPassword')->name('resetpassword');
    Route::post('/resetpassword', 'resetPasswordPost')->name('resetpasswordPost');
});



// group route that utilizes the same controller class
Route::controller(LeaveRequestController::class)->group(function () {
    Route::get('/leave-request', 'index')->middleware('isLoggedIn');
    Route::post('/leave-request/add', 'store');
    Route::get('/leave-request/{id}', 'show')->middleware('isLoggedIn');
    Route::post('/leave-request/update', 'update');
    Route::post('/leave-request/delete', 'delete');
});

Route::controller(employeeTableController::class)->group(function () {
    Route::get('/employeetable', 'employeeTable')->middleware('isLoggedIn');
    Route::post('/employeetable-deactivate/{id}', 'deactivateUser');
    Route::post('/employeetable-activate/{id}','activateUser');
    Route::post('/employee-save', 'store');
    Route::post('/employee-update/{id}', 'update');
    Route::post('/employee-delete/{id}','delete');
});
/* 
Route::get('/employeetable', [employeeTableController::class, 'employeeTable'])->middleware('isLoggedIn');
Route::post('/employeetable-deactivate/{id}', [employeeTableController::class, 'deactivateUser']);
Route::post('/employeetable-activate/{id}', [employeeTableController::class, 'activateUser']);
Route::post('/employee-save', [employeeTableController::class, 'store']);
Route::post('/employee-update/{id}', [employeeTableController::class, 'update']);
Route::post('/employee-delete/{id}', [employeeTableController::class, 'delete']); */
