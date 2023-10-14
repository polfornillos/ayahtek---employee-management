@extends('layouts.main-base')

@section('script')
@endsection

@section('content')
<div class="main-content">
        <h1 class="page-title">EMPLOYEES</h1>
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
                        <div id="add-modal" class="addModal">
                            <div class="add-modal-content">
                                <span class="close"></span>
                                <div class="add-header">
                                    <h3 class="modal-header">ADD EMPLOYEE</h3>
                                    <img class="modal-logo" src="images/ayahtek-logo.png" alt="Logo">
                                </div>
                                <div id="employee-details-row-one" class="employee-details-container">
                                    <div class="employee-details-row">
                                        <div class="employee-details-header"> Employee Details</div>
                                        <hr id="employee-details-divider"class="solid">
                                        <div class="employee-details-content">
                                            <div class="employee-details">
                                                <div id="employee-id-container" class="employee-content">
                                                    <h3>Employee ID:</h3>
                                                    <input name="id" class="textbox" type="text" required>
                                                </div>
                                                <div id="employee-name-container" class="employee-content">
                                                    <h3>Employee Name:</h3>
                                                    <input name="name" class="textbox" type="text" required>
                                                </div>
                                                <div id="employee-birthday-container" class="employee-content">
                                                    <h3>Birthday</h3>
                                                    <select name="month" id="month">
                                                        <option value="empty" disabled selected>Month</option>
                                                        <?php
                                                        $months = [
                                                            'January', 'February', 'March', 'April', 'May', 'June',
                                                            'July', 'August', 'September', 'October', 'November', 'December'
                                                        ];
                                                        foreach ($months as $month) {
                                                            echo "<option value=\"$month\">$month</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <select name="day" id="day">
                                                        <option value="empty" disabled selected>Day</option>
                                                        <?php
                                                        for ($day = 1; $day <= 31; $day++) {
                                                            $dayFormatted = str_pad($day, 2, '0', STR_PAD_LEFT); // Add leading zero if needed
                                                            echo "<option value=\"$dayFormatted\">$dayFormatted</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <select name="year" id="year">
                                                        <option value="empty" disabled selected>Year</option>
                                                        <?php
                                                        $currentYear = date("Y");
                                                        $startYear = 1973;
                                                        for ($year = $currentYear; $year >= $startYear; $year--) {
                                                            echo "<option value=\"$year\">$year</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div id="employee-gender-container" class="employee-content">
                                                    <h3>Gender</h3>
                                                    <select name="gender" id="gender">
                                                        <option value="empty" disabled selected></option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                                <div id="employee-contact-container" class="employee-content">
                                                    <h3>Contact number</h3>
                                                    <input name="contact" class="textbox" type="text" required>
                                                </div>
                                            </div>
                                            <div class="employee-details">
                                                <div id="employee-id-container" class="employee-content">
                                                    <h3>Salary</h3>
                                                    <input name="salary" class="textbox" type="text" required>
                                                </div>
                                                <div id="employee-name-container" class="employee-content">
                                                    <h3>SSS Number</h3>
                                                    <input name="sss_number" class="textbox" type="text" required>
                                                </div>
                                                <div id="employee-birthday-container" class="employee-content">
                                                    <h3>Philhealth Number</h3>
                                                    <input name="philhealth_number" class="textbox" type="text" required>
                                                </div>
                                                <div id="employee-gender-container" class="employee-content">
                                                    <h3>TIN</h3>
                                                    <input name="tin" class="textbox" type="text" required>
                                                </div>
                                                <div id="employee-contact-container" class="employee-content">
                                                    <h3>Date Added</h3>
                                                    <input name="created_at" class="date" type="date" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div id="employee-details-row-two" class="employee-details-row">
                                        <div class="employee-details-header"> Employee Details</div>
                                        <hr id="employee-details-divider"class="solid">
                                        <div class="employee-details-content">
                                            <div class="employee-details">
                                                <div id="employee-emergency-name-container" class="employee-content">
                                                    <h3>Name</h3>
                                                    <input name="emergency_contact_name" class="textbox" type="text">
                                                </div>
                                                <div id="employee-emergency-relationship-container" class="employee-content">
                                                    <h3>Relationship</h3>
                                                    <input name="emergency_contact_name" class="textbox" type="text">
                                                </div>
                                                <div id="employee-emergency-contact-container" class="employee-content">
                                                    <h3>Contact Number</h3>
                                                    <input name="emergency_contact_name" class="textbox" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="employee-button-container">
                                            <button id="add-cancel-btn" class="cancel-employee-button">CANCEL</button>
                                            <button id="submit-btn" class="submit-employee-button">SUBMIT</button>                 
                                        </div>
                                    </div>              
                                </div>
                            </div>
                        </div>
                        <div class="filter-dropdown-container">
                            <button class="filters-button">Filters</button>
                            <ul class="dropdown-menu">
                                <li id="item-birthday" class="dropdown-item" data-filter-type="birthday"><i id="cake-icon" class="fa-solid fa-cake-candles"></i>Birthday
                                    <ul class="submenu">
                                        <li class="dropdown-item" data-filter-type="birthday-january">January</li>
                                        <li class="dropdown-item" data-filter-type="birthday-febuary">Febuary</li>
                                        <li class="dropdown-item" data-filter-type="birthday-march">March</li>
                                        <li class="dropdown-item" data-filter-type="birthday-april">April</li>
                                        <li class="dropdown-item" data-filter-type="birthday-may">May</li>
                                        <li class="dropdown-item" data-filter-type="birthday-june">June</li>
                                        <li class="dropdown-item" data-filter-type="birthday-july">July</li>
                                        <li class="dropdown-item" data-filter-type="birthday-august">August</li>
                                        <li class="dropdown-item" data-filter-type="birthday-september">September</li>
                                        <li class="dropdown-item" data-filter-type="birthday-october">October</li>
                                        <li class="dropdown-item" data-filter-type="birthday-november">November</li>
                                        <li class="dropdown-item" data-filter-type="birthday-december">December</li>
                                    </ul>
                                </li>
                                <li id="item-gender" class="dropdown-item" data-filter-type="gender"><i id="gender-icon" class="fa-solid fa-user"></i>Gender
                                    <ul class="submenu">
                                        <li class="dropdown-item" data-filter-type="gender-male">Male</li>
                                        <li class="dropdown-item" data-filter-type="gender-female">Female</li>
                                        <li class="dropdown-item" data-filter-type="gender-others">Others</li>
                                    </ul>
                                </li>
                                <li id="item-status" class="dropdown-item" data-filter-type="status"><i id="status-icon" class="fa-solid fa-circle-exclamation"></i>Status
                                    <ul class="submenu">
                                        <li class="dropdown-item" data-filter-type="status-active">Active</li>
                                        <li class="dropdown-item" data-filter-type="status-inactive">Inactive</li>
                                    </ul>
                                </li>
                                <li id="item-reset" class="dropdown-item" data-filter-type="reset"><i id="reset-icon" class="fa-solid fa-circle-check"></i>Reset</li>
                            </ul>
                        </div>
                    </div>
                    <button class="add-employee-button">Add Employee</button>
                </div>
            </div>
            <div class="table-container">
                <table class="main-table">
                    <thead>
                        <tr>
                            <th><a href="#" class="header-link" data-sort-order="asc">ID <span class="sort-icon fas fa-sort-down"></span></a></th>
                            <th><a href="#" class="header-link" data-sort-order="asc">Name <span class="sort-icon fas fa-sort-down"></span></a></th>
                            <th><a href="#" class="header-link" data-sort-order="asc">Birthday <span class="sort-icon fas fa-sort-down"></span></a></th>
                            <th><a href="#" class="header-link" data-sort-order="asc">Gender <span class="sort-icon fas fa-sort-down"></span></a></th>
                            <th>Contact</th>
                            <th><a href="#" class="header-link" data-sort-order="asc">Date Updated <span class="sort-icon fas fa-sort-down"></span></a></th>
                            <th id="status"><a href="#" class="header-link" data-sort-order="asc">Status <span class="sort-icon fas fa-sort-down"></span></a></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="table-data">
                        @if($employees)
                        @foreach ($employees as $employee)
                        <tr>
                            <!-- Populate main table -->
                            <td>EMP-{{ str_pad($employee->id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($employee->birthday)->format('F d, Y') }}</td>
                            <td>{{ $employee->gender }}</td>
                            <td>{{ $employee->contact }}</td>
                            <td>{{ $employee->updated_at->format('F d, Y') }}</td>
                            <td><div class='status-container'><span class='status-{{$employee->status}}'>{{ucfirst($employee->status)}}</span></div></td>
                            <td><div class="dropdown-option">
                                    <button class="dropdown-toggle" type="button">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu-option" id="myDropdown" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item-option view-button" href="#" data-employee-id="{{ $employee->id }}">View</a>
                                        <a class="dropdown-item-option" href="#">Deactivate</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
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
    @if($employees)
    @foreach ($employees as $employee)
    <div id="viewModal{{ $employee->id }}" class="view-modal-container">
        <div class="view-modal-content">
            <div class="view-modal-header">
                <h3 class="modal-header">EMPLOYEE PROFILE</h3>
                <img class="modal-logo" src="images/ayahtek-logo.png" alt="Logo">
            </div>
            <div id="employee-details-row-one" class="employee-details-container">
                <div class="employee-details-row">
                    <div class="employee-details-header"> Employee Details</div>
                    <hr id="employee-details-divider"class="solid">
                    <div class="employee-details-content">
                        <div class="employee-details">
                            <div id="employee-id-container" class="employee-content">
                                <h3>Employee ID</h3>
                                <p class="employee-id">EMP-{{ str_pad($employee->id, 3, '0', STR_PAD_LEFT) }}</p>
                            </div>
                            <div id="employee-name-container" class="employee-content">
                                <h3>Employee Name</h3>
                                <p class="employee-name">{{ $employee->name }}</p>
                            </div>
                            <div id="employee-birthday-container" class="employee-content">
                                <h3>Birthday</h3>
                                <p class="employee-birthday">{{ \Carbon\Carbon::parse($employee->birthday)->format('F d, Y') }}</p>
                            </div>
                            <div id="employee-gender-container" class="employee-content">
                                <h3>Gender</h3>
                                <p class="employee-gender">{{ $employee->gender }}</p>
                            </div>
                            <div id="employee-contact-container" class="employee-content">
                                <h3>Contact number</h3>
                                <p class="employee-contact">{{ $employee->contact }}</p>
                            </div>
                        </div>
                        <div class="employee-details">
                            <div id="employee-id-container" class="employee-content">
                                <h3>Salary</h3>
                                <p>{{ $employee->salary }}</p>
                            </div>
                            <div id="employee-name-container" class="employee-content">
                                <h3>SSS Number</h3>
                                <p>{{ $employee->sss_number }}</p>
                            </div>
                            <div id="employee-birthday-container" class="employee-content">
                                <h3>Philhealth Number</h3>
                                <p>{{ $employee->philhealth_number }}</p>
                            </div>
                            <div id="employee-gender-container" class="employee-content">
                                <h3>TIN</h3>
                                <p>{{ $employee->tin }}</p>
                            </div>
                            <div id="employee-contact-container" class="employee-content">
                                <h3>Date Added</h3>
                                <p>{{ $employee->created_at->format('F d, Y')  }}</p>
                            </div>
                        </div>
                    </div>
                </div> 
                <div id="employee-details-row-two" class="employee-details-row">
                    <div class="employee-details-header"> Employee Details</div>
                    <hr id="employee-details-divider"class="solid">
                    <div class="employee-details-content">
                        <div class="employee-details">
                            <div id="employee-emergency-name-container" class="employee-content">
                                <h3>Name</h3>
                                <p>Not Available</p>
                            </div>
                            <div id="employee-emergency-relationship-container" class="employee-content">
                                <h3>Relationship</h3>
                                <p>Not Available</p>
                            </div>
                            <div id="employee-emergency-contact-container" class="employee-content">
                                <h3>Contact Number</h3>
                                <p>Not Available</p>
                            </div>
                        </div>
                    </div>
                    <div class="employee-button-container">
                        <button class="cancel-employee-button">Cancel</button>
                        <button class="edit-employee-button" data-employee-id="{{ $employee->id }}">Edit</button>                 
                    </div>
                </div>               
            </div>
        </div>
    </div>
    @endforeach
    @endif  
@endsection