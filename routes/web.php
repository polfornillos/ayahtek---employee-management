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

Route::get('/employeetable', [employeeTableController::class, 'employeetable']);
