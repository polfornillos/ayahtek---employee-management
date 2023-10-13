<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\employeeTableController;

<<<<<<< HEAD

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

=======
Route::get('/employeetable', [employeeTableController::class, 'employeeTable']); 
Route::get('/', [employeeTableController::class, 'index']); 
>>>>>>> 4cd14a4db8a390fb9757c100e3472c86d0f30b11
