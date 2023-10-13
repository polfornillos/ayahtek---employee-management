<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\employeeTableController;

Route::get('/employeetable', function () {
    return view('current.employee-table');
});


Route::get('/welcome', [employeeTableController::class, 'index']); 