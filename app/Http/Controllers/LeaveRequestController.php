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

    // function to add leave request data in db
    public function store(Request $request) {
      $data = [
        'name' => $request->name,
        'credits' => $request->credits,
        'tLeave' => $request->tLeave,
        'daysLeave' => $request->daysLeave,
        'sLeave' => $request->sLeave,
        'eLeave' => $request->eLeave,
        'Reason' => $request->Reason,
      ];
    }
}
