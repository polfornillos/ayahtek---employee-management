<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Models\AEmployees;

class employeeTableController extends Controller
{
    public function index() { 
        return view('welcome');
     
    }

    public function employeetable(){
        return view('current.employee-table');
    }
}
