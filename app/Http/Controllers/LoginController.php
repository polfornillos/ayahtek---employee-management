<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('current.admin-login');
    }

    public function forgotpassword(){
        return view('current.admin-forgotpassword');
    }
    
    public function enterSecurityCode(){
        return view('current.admin-entersecuritycode');
    }

    public function resetpassword(){
        return view('current.admin-resetpassword');
    }
}
