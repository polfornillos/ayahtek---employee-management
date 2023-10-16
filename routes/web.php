<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\employeeTableController;

Route::get('/employeetable', [employeeTableController::class, 'employeeTable']);
Route::post('/employeetable-deactivate/{id}', [employeeTableController::class, 'deactivateUser']);
Route::get('/', [employeeTableController::class, 'index']); 