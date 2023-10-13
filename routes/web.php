<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\employeeTableController;
use App\Http\Controllers\LoginController;



Route::get('/', [LoginController::class, 'login']);

Route::get('/forgotpassword', [LoginController::class, 'forgotpassword']);

Route::get('/verifycode', [LoginController::class, 'enterSecurityCode']);

Route::get('/resetpassword', [LoginController::class, 'resetpassword']);

Route::get('/employeetable', [employeeTableController::class, 'employeetable']);

Route::get('/welcome', [employeeTableController::class, 'index']); 