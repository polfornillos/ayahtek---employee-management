<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AEmployees;
use App\Models\User;
use Session;
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
        $data = User::where('id', '=', Session::get('loginId'))->first();
        return view('current.admin-employee-table',compact('data','employees'));
    }

    public function deactivateUser($id) {
        $employee = AEmployees::find($id);
        
        if ($employee) {
            $employee->update(['status' => 'inactive']);
            
            return redirect('/employeetable');
        }
    }
    
    public function create() {
        return view('current.admin-employee-table');
    }

    public function store(Request $request) {
        $data = [
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
