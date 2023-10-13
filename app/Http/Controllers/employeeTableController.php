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
    // !Test Creation of Employee Juan Dela Cruz
    /*public function createEmployee(){
        $employee = new AEmployees;
        $employee->name = "Juan Dela Cruz";
        $employee->birthday = "2000,01,01 ";
        $employee->gender = "Male";
        $employee->contact = "+638965654177";
        $employee->status = "active";
        $employee->salary = 20000;
        $employee->sss_number = "74-5635493-8";
        $employee->philhealth_number = "91-871187398-9";
        $employee->tin = "417-741-554-663";

        $employee->save();

        return view('current.employee-table');
    }*/
}
