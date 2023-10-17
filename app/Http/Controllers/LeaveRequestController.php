<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class LeaveRequestController extends Controller
{

  private $LRequest;

  public function __construct() {
    $this->LRequest = new LRequest();
  }

    // renders leave request page
    public function index() {
      $leaveRequests = $this->LRequest->getLRequests();
      $data = User::where('id', '=', Session::get('loginId'))->first();
      return view('current.admin-leave-request', compact('data','leaveRequests'));
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
        'reason' => $request->reason,
        'status' => $request->status,
      ];

      $this->LRequest->saveLRequest($data);

      return redirect('/leave-request');
    }

    public function show($id) {
      $user = $this->LRequest->getLeaveReq($id);

      return response()->json($user);
    }
}
