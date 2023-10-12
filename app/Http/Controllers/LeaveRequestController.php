<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    // renders leave request page
    public function index() {
      return view('current.admin-leave-request');
    }
}
