<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD

use App\Http\Controllers\employeeTableController;


=======
use App\Http\Controllers\employeeTableController;

>>>>>>> 66e0856599775f1aa0dd314886772567bc04f6a1
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

Route::get('/welcome', [employeeTableController::class, 'index']); 