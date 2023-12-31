<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LRequest;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LeaveRequestController extends Controller
{

  private $LRequest;

  public function __construct() {
    $this->LRequest = new LRequest();
  }

    // renders leave request page
    public function index(Request $request) {
      $leaveRequests = $this->LRequest->getLRequests();
      $data = User::where('id', '=', Session::get('loginId'))->first();


      if($request->has('filter')) {
        $leaveRequests = match ($request->filter) {
          'approve' => $leaveRequests->where('status', 'Approved'),
          'pending' => $leaveRequests->where('status', 'Pending'),
          'denied' => $leaveRequests->where('status', 'Denied'),
          'highCredit' => $leaveRequests->where('credits', '>', 4),
          'lowCredit' => $leaveRequests->where('credits', '<', 5),
          'reset' => $leaveRequests,
        };
      }

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

    public function update(Request $request) {

      $id = $request->leaveReqId;

      $data = $request->intent;

      $this->LRequest->updateLeaveReq($data, $id);

      return redirect('/leave-request');
    }

    public function delete(Request $request) {
      $id = $request->leaveReqId;

      $leaveRequest = LRequest::find($id);
      $lastDeletedId = $leaveRequest->id;
      $leaveRequest->delete();

      DB::statement("ALTER TABLE l_request AUTO_INCREMENT = $lastDeletedId");

      return redirect('/leave-request');
    }
}
