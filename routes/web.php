<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\employeeTableController;
use App\Http\Controllers\LeaveRequestController;

Route::get('/', function () {
    return view('current.admin-login');
});

Route::get('/forgotpassword', function () {
    return view('current.admin-forgotpassword');
});

Route::get('/verifycode', function () {
    return view('current.admin-entersecuritycode');
});

Route::get('/resetpassword', function () {
    return view('current.admin-resetpassword');
});

Route::get('/employeetable', function () {
    return view('current.employee-table');
});

Route::get('/leave-request', [LeaveRequestController::class, 'index']);
Route::get('/employeetable', [employeeTableController::class, 'employeeTable']); 
