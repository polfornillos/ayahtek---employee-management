@extends('layouts.main-base')

@section('script')
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
        <h1 class="page-title">Leave Requests</h1>
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
                            <ul class="dropdown-menu">
                              <li class="dropdown-item">Approved</li>
                              <li class="dropdown-item">Pending</li>
                              <li class="dropdown-item">Declined</li>
                              <li class="dropdown-item">High Credit</li>
                              <li class="dropdown-item">Low Credit</li>
                              <li class="dropdown-item">Reset Filter</li>
                            </ul>
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
                    <tbody>
                    </tbody>
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
            <form action="" method="post">
              <label for="name" class="form-label">Name:</label>
              <input type="input" id="name" name="name" class="form-control mb-4" >

              <label for="credits" class="form-label">Credits:</label>
              <input type="input" id="credits" name="credits" class="form-control mb-4" >
              
              <label for="tLeave" class="form-label">Type of Leave</label>
              <input type="input" id="tLeave" name="tLeave" class="form-control mb-4" >

              <label for="daysLeave" class="form-label">Days of Leave</label>
              <input type="input" id="daysLeave" name="daysLeave" class="form-control mb-4" >

              <label for="sLeave" class="form-label">Start of Leave</label>
              <input type="date" id="sLeave" name="sLeave" class="form-control mb-4" >

              <label for="eLeave" class="form-label">End of Leave</label>
              <input type="date" id="eLeave" name="eLeave" class="form-control mb-4" >

              <label for="reason">Reason</label>
              <textarea class="form-control" placeholder="Leave your reason here" id="reason" name="reason"></textarea>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('jquery')
  <script>
    $(document).ready(function() {
      // code goes here ...
    });
  </script>
@endsection