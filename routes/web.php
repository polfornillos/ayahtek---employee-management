<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\employeeTableController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('current.admin-login');
});

Route::get('/forgotpassword', [LoginController::class, 'forgotpassword']);

Route::get('/verifycode', [LoginController::class, 'enterSecurityCode']);

Route::get('/resetpassword', [LoginController::class, 'resetpassword']);

Route::get('/leaverequest', [LeaveRequestController::class, 'index']);

// group route that utilizes the same controller class
Route::controller(LeaveRequestController::class)->group(function () {
    Route::get('/leave-request}', 'index');
    Route::post('/leave-request/add', 'store');
});

Route::get('/employeetable', [employeeTableController::class, 'employeeTable']);
Route::post('/employeetable-deactivate/{id}', [employeeTableController::class, 'deactivateUser']);

