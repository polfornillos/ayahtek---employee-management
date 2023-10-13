<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AEmployees;

class employeeTableController extends Controller
{
    private $employees;

    public function __construct()
    {
        $this->employees = new AEmployees();
    }
    
    public function index() { 
        return view('welcome');
    }

    public function employeeTable() { 
        $employees = $this->employees->getEmployees();

        return view('current.employee-table',compact('employees'));
    }
}
