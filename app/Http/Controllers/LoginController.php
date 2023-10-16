<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AEmployees;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    protected $admin;
    protected $employees;

    public function __construct(){
        $this->admin = new User();
        $this->employees = new AEmployees();
    }
    
    public function login(){
        return view('auth.admin-login');
    }
    
    public function loginAdmin(Request $request){
        $data = $request->all();
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $admin = User::where('email', '=', $request->email)->first();
        if($admin){
            if(Hash::check($request->password, $admin->password)){
                if(isset($data['remember'])&&!empty($data['remember'])){
                    setcookie("email",$data['email'],time()+3600);
                    setcookie("password",$data['password'],time()+3600);
                }else{
                    setcookie("email","");
                    setcookie("password","");
                }
                $request->session()->put('loginId', $admin->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail', 'The email or password does not exist.');
            }
        }else{
            return back()->with('fail', 'The email or password does not exist.');
        }
    }

    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
            $employees = $this->employees->getEmployees();
        }
        return view('current.admin-employee-table', compact('data','employees'));
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('/');
        }
    }

    public function forgotpassword(){
        return view('auth.admin-forgotpassword');
    }
    
    public function enterSecurityCode(){
        return view('auth.admin-entersecuritycode');
    }

    public function resetpassword(){
        return view('auth.admin-resetpassword');
    }
}
