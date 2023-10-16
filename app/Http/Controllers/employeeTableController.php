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

    public function create() {
        return view('current.admin-employee-table');
    }

    public function store(Request $request) {
        $data = [
            'id' => $request->id,
            'name' => $request->name,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'contact' => $request->contact,
            'salary' => $request->salary,
            'sss_number' => $request->sss_number,
            'philhealth_number' => $request->philhealth_number,
            'emergency_contact_name' => $request->emergency_contact_name,
            'emergency_contact_number' => $request->emergency_contact_number,
            'emergency_contact_relationship' => $request->emergency_contact_relationship,
        ];

        $this->employees->saveEmployee($data); 

        return redirect('/employeetable');
    }
}
