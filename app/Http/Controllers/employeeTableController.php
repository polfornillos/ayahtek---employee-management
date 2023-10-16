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

        return view('current.admin-employee-table',compact('employees'));
    }

    public function deactivateUser($id) {
        $employee = AEmployees::find($id);
        
        if ($employee) {
            $employee->update(['status' => 'inactive']);
            
            return redirect('/employeetable');
        }
    }
}
