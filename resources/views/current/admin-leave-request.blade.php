@extends('layouts.main-base')

@section('script')
  <!-- css -->
  <link href="{{ asset('/css/admin-leave-request-modal.css') }}" rel="stylesheet"> 
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


  <!-- jquery -->
  <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

@endsection

@section('content')
<div class="main-content">
        <h1 class="page-title">LEAVE REQUESTS</h1>
        <div class="employee-table">
            <div class="header-employee-table">
                <div class="actions">            
                    <div class="button-container">
                        <div class="search-container">
                            <form id="search-form">
                                <input type="text" placeholder="Search..." name="search" id="search-input">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="filter-dropdown-container">
                            <button class="filters-button">Filter</button>
                            <form action="/leave-request" method="GET" class="dropdown-menu dropdown-menu-lr">
                              @csrf
                              <button type="submit" name="filter" value="approve" class="dropdown-item-lr">Approved</button>
                              <button type="submit" name="filter" value="pending" class="dropdown-item-lr">Pending</button>
                              <button type="submit" name="filter" value="denied" class="dropdown-item-lr">Denied</button>
                              <button type="submit" name="filter" value="highCredit" class="dropdown-item-lr">High Credit</button>
                              <button type="submit" name="filter" value="lowCredit" class="dropdown-item-lr">Low Credit</button>
                              <button type="submit" name="filter" value="reset" class="dropdown-item-lr">Reset Filter</button>
                            </form>
                        </div>
                    </div>
                    <button class="add-employee-button" data-bs-toggle="modal" data-bs-target="#add-leave-request-modal">Add Leave Request</button>
                </div>
            </div>
            <div class="table-container">
                <table class="main-table">
                    <thead>
                        <tr>
                            <th><a href="#" class="header-link" data-sort-order="asc">ID <span class="sort-icon fas fa-sort-down"></span></a></th>
                            <th><a href="#" class="header-link" data-sort-order="asc">Name <span class="sort-icon fas fa-sort-down"></span></a></th>
                            <th><a href="#" class="header-link" data-sort-order="asc">Days of leave <span class="sort-icon fas fa-sort-down"></span></a></th>
                            <th><a href="#" class="header-link" data-sort-order="asc">Credits <span class="sort-icon fas fa-sort-down"></span></a></th>
                            <th><a href="#" class="header-link" data-sort-order="asc">Start Date <span class="sort-icon fas fa-sort-down"></span></a></th>
                            <th><a href="#" class="header-link" data-sort-order="asc">End Date <span class="sort-icon fas fa-sort-down"></span></a></th>
                            <th id="status"><a href="#" class="header-link" data-sort-order="asc">Status <span class="sort-icon fas fa-sort-down"></span></a></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="table-data">
                      @if($leaveRequests)
                        @foreach($leaveRequests as $lr)
                          <tr>
                            <!-- Populate main table -->                           
                            <td>EMP-{{ str_pad($lr->id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $lr->name }}</td>
                            <td>{{ $lr->daysLeave }}</td>
                            <td>{{ $lr->credits }}</td>
                            <td>{{ \Carbon\Carbon::parse($lr->sLeave)->format('F d, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($lr->eLeave)->format('F d, Y') }}</td>
                            <td><div class='status-container'><span data-status="{{$lr->status}}">{{$lr->status}}</span></div></td>
                            <td>
                              <div class="dropdown-option">
                                    <button class="dropdown-toggle-lr" type="button">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu-option" id="myDropdown" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item-option view-button"
                                        data-url="/leave-request/{{$lr->id}}" data-bs-toggle="modal" data-bs-target="#leave-request-modal" href="javascript:void(0)" >View</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                      @endif
                </table>
            </div>
            <div class="table-footer">
                <div class="entries-container">
                    <p id="entries-count"><span id="countText"></span></p>
                </div>
                <div class="pagination">
                    <button id="prev-page"><i class="fa-solid fa-caret-left fa-xl"></i></i></button>
                    <span id="page-info"></span>
                    <button id="next-page"><i class="fa-solid fa-caret-right fa-xl"></i></button>
                </div>
            </div>
        </div> 
    </div>

    <div class="modal fade" id="add-leave-request-modal" tabindex="-1" aria-labelledby="addLeaveRequestModalLabel" aria-hidden="false">
      <div class="modal-dialog">
        <div class="modal-content p-4">
          <div class="modal-header-lr">
            <h1 class="modal-title fs-5 text-center" id="addLeaveRequestModalLabel">Add Leave Request</h1>
            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
          </div>
          <div class="modal-body">
            <form action="/leave-request/add" method="post">
              @csrf
              
              <label for="name" class="form-label">Name:</label>
              <input type="input" id="name" name="name" class="form-control mb-4" >

              <label for="credits" class="form-label">Credits:</label>
              <input type="input" id="credits" name="credits" class="form-control mb-4" >
              
              <label for="tLeave" class="form-label">Type of Leave</label>
              <input type="input" id="tLeave" name="tLeave" class="form-control mb-4" >

              <label for="sLeave" class="form-label">Start of Leave</label>
              <input type="date" id="sLeave" name="sLeave" class="form-control mb-4" >

              <label for="eLeave" class="form-label">End of Leave</label>
              <input type="date" id="eLeave" name="eLeave" class="form-control mb-4" >

              <label for="daysLeave" class="form-label">Days of Leave</label>
              <input type="input" id="daysLeave" name="daysLeave" class="form-control mb-4" readonly>

              <label for="reason">Reason</label>
              <textarea class="form-control mb-4" placeholder="Leave your reason here" id="reason" name="reason"></textarea>

              <!-- <label for="status" class="form-label">Status</label> -->
              <input type="input" id="status" name="status" value="Pending" hidden >

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="leave-request-modal" tabindex="-1" aria-labelledby="LeaveRequestModalLabel" aria-hidden="false">
      <section class="modal-content-lr-view">
        <header class="modal-header-lr-view">
          <h5 class="modal-title-lr-view">Leave Request</h5>
          <img src="./images/ayahtek-logo.png" alt="logo">
        </header>

        <div class="modal-body-lr-view">
          <div class="employee-details-lr-view">
            <h6 class="subheading-modal-lr-view">Employee Details</h6>
            <div class="employee-details-container-lr-view">
              <p class="detail-controller"><span class="leave-request-detail-header">Employee ID</span><span data-employee-leave-datail="id"></span></p>
              <p class="detail-controller"><span class="leave-request-detail-header">Days of leave</span><span data-employee-leave-datail="leaveCount"></span></p>
              <p class="detail-controller"><span class="leave-request-detail-header">Employee Name</span><span data-employee-leave-datail="name"></span></p>
              <p class="detail-controller"><span class="leave-request-detail-header">Start Date</span><span data-employee-leave-datail="startDate"></span></p>
              <p class="detail-controller"><span class="leave-request-detail-header">Remaining Credits</span><span data-employee-leave-datail="credits"></span></p>
              <p class="detail-controller"><span class="leave-request-detail-header">End date</span><span data-employee-leave-datail="endDate"></span></p>
              <p class="detail-controller"><span class="leave-request-detail-header">Leave Type</span><span data-employee-leave-datail="leaveType"></span></p>
              <p class="detail-controller"><span class="leave-request-detail-header">Reason</span><span data-employee-leave-datail="reason"></span></p>
            </div>
          </div>
          <div class="emergency-contact-lr-view">
            <h6 class="subheading-modal-lr-view">Employee Details</h6>
            <div class="emergency-contact-details-container-lr-view">
              <p class="detail-controller"><span class="leave-request-detail-header">Name</span><span data-employee-leave-detail="cName">Not Available</span></p>
              <p class="detail-controller"><span class="leave-request-detail-header">Relationship</span><span data-employee-leave-detail="cRelation">Not Available</span></p>
              <p class="detail-controller"><span class="leave-request-detail-header">Contact Number</span><span data-employee-leave-detail="cContact">Not Available</span></p>
            </div>
          </div>
        </div>

        <div class="modal-footer-lr-view">
          <div class="grant-section">
            <form action="/leave-request/update" method="POST">
              @csrf
              <input type="text" id="grant-input" name="leaveReqId" hidden>
              <button type="submit" name="intent" value="Approved" class="btn-lr-view btn-approve-lr-view">Approve</button>
              <button type="submit" name="intent" value="Denied" class="btn-lr-view btn-deny-lr-view">Deny</button>
            </form>
          </div>
          <div class="edit-section">
            <form action="/leave-request/delete" method="POST">
              @csrf
              <input type="text" id="del-input" name="leaveReqId" hidden>
              <button type="button" class="btn-lr-view btn-cancel-lr-view" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn-lr-view btn-delete-lr-view">Delete</button>
            </form>
          </div>
        </div>
      </section>
    </div>

@endsection

@section('jquery')
  <script>
    $(document).ready(function() {
      $("tbody").on("click", ".dropdown-toggle-lr", function(event) {
        // close all dropdown, excluding the target
        $(".dropdown-menu-option").not($(this).closest("tr").find(".dropdown-menu-option")).hide();

        // toggle visibility of target dropdown
        $(this).closest("tr").find(".dropdown-menu-option").toggle();
      });

      // Add a click event to the modal backdrop
      $('#leave-request-modal').on('click', function (e) {
        // Check if the click target is the modal backdrop itself
        if (e.target === this || e.target.dataset.dismiss) {
          // Close the modal
          $('#leave-request-modal').hide();
          $('.modal-backdrop').hide();
        }
      });

      // $('.dropdown-item-option').on('click', function() {
      //   $('#leave-request-modal').show();
      //   $('.modal-backdrop').show();
      // })

      $("tbody").on('click', '.view-button', function () {

          const userURL = $(this).data('url'); 

          // use ajax to get the data of leave request
          $.get(userURL, function (data) {

              // show modal
              $('#leave-request-modal').show();
              $('.modal-backdrop').show();

              // populate modal with the fetched data
              $('[data-employee-leave-datail="id"]').text(data.id);
              $('[data-employee-leave-datail="name"]').text(data.name);
              $('[data-employee-leave-datail="leaveCount"]').text(data.daysLeave);
              $('[data-employee-leave-datail="credits"]').text(data.credits);
              $('[data-employee-leave-datail="startDate"]').text(formatDate(data.sLeave));
              $('[data-employee-leave-datail="endDate"]').text(formatDate(data.eLeave));
              $('[data-employee-leave-datail="leaveType"]').text(data.tLeave);
              $('[data-employee-leave-datail="reason"]').text(data.reason);
              $('#grant-input').val(data.id);
              $('#del-input').val(data.id);
          })

      });
      
    });

    function formatDate(date) {
      const months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
      ];
    
      const dateObject = new Date(date);
      const month = months[dateObject.getMonth()];
      const day = dateObject.getDate();
      const year = dateObject.getFullYear();
    
      return `${month} ${day.toString().padStart(2, '0')}, ${year}`;
    }

  // Calculate Days of leave
  const sLeaveInput = document.getElementById('sLeave');
  const eLeaveInput = document.getElementById('eLeave');
  const daysLeaveInput = document.getElementById('daysLeave');

  sLeaveInput.addEventListener('input', updateDaysOfLeave);
  eLeaveInput.addEventListener('input', updateDaysOfLeave);

  // Function to calculate the number of days between two dates
  function dateDiffInDays(date1, date2) {
    const diffInMilliseconds = date2 - date1;
    return Math.round(diffInMilliseconds / (1000 * 60 * 60 * 24));
  }

  // Function to update the 'Days of Leave' field
  function updateDaysOfLeave() {
    const startDate = new Date(sLeaveInput.value);
    const endDate = new Date(eLeaveInput.value);

    if (!isNaN(startDate.getTime()) && !isNaN(endDate.getTime())) {
      const days = dateDiffInDays(startDate, endDate);
      if (days >= 0) {
        daysLeaveInput.value = days;
      } else {
        daysLeaveInput.value = '';
      }
    } else {
      daysLeaveInput.value = '';
    }
  }
  </script>
@endsection