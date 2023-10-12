<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
<<<<<<< HEAD
use App\Http\Controllers\employeeTableController;

=======

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
>>>>>>> 5088af0edf06882b803009d72447b9ea0ef8a508
=======

use App\Http\Controllers\employeeTableController;

>>>>>>> 1fcceec822c12cfc975eff1a40a75478578a3a5f
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

Route::get('/employee-table', function () {
    return view('current.employee-table');
});


Route::get('/welcome', [employeeTableController::class, 'index']); 