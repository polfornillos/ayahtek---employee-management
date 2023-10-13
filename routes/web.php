<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\employeeTableController;

Route::get('/employeetable', [employeeTableController::class, 'employeeTable']); 
Route::get('/', [employeeTableController::class, 'index']); 