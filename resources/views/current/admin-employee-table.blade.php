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
                    <button class="add-employee-button" id="add-employee-button">Add Employee</button>

                    <div id="add-modal" class="add-modal-container">
                        <form method="POST" action="/employee-save">
                        @csrf
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
                                                <input name="id" class="textbox" type="text" disabled>
                                            </div>
                                            <div id="employee-name-container" class="employee-content">
                                                <h3>Employee Name:</h3>
                                                <input name="name" class="textbox" type="text" required>
                                            </div>
                                            <div id="employee-birthday-container" class="employee-content">
                                                <h3>Birthday</h3>
                                                <input name="birthday" class="date" type="date" required>
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
                                                <input id="contact" name="contact" class="textbox" type="text" maxlength="13" required>
                                            </div>
                                        </div>
                                        <div class="employee-details">
                                            <div id="employee-id-container" class="employee-content">
                                                <h3>Salary</h3>
                                                <input id="salary" name="salary" class="textbox" type="text" required>
                                            </div>
                                            <div id="employee-name-container" class="employee-content">
                                                <h3>SSS Number</h3>
                                                <input id="sss_number" name="sss_number" class="textbox" type="text"  required>
                                            </div>
                                            <div id="employee-birthday-container" class="employee-content">
                                                <h3>Philhealth Number</h3>
                                                <input id="philhealth_number" name="philhealth_number" class="textbox" type="text" required>
                                            </div>
                                            <div id="employee-gender-container" class="employee-content">
                                                <h3>TIN</h3>
                                                <input id="tin" name="tin" class="textbox" type="text" required>
                                            </div>
                                            <div id="employee-contact-container" class="employee-content">
                                                <h3>Date Added</h3>
                                                <input name="created_at" class="date" type="date" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div id="employee-details-row-two" class="employee-details-row">
                                    <div class="employee-details-header"> Emergency Contact</div>
                                    <hr id="employee-details-divider"class="solid">
                                    <div class="employee-details-content">
                                        <div class="employee-details">
                                            <div id="employee-emergency-name-container" class="employee-content">
                                                <h3>Name</h3>
                                                <input name="emergency_contact_name" class="textbox" type="text">
                                            </div>
                                            <div id="employee-emergency-relationship-container" class="employee-content">
                                                <h3>Relationship</h3>
                                                <input name="emergency_contact_relationship" class="textbox" type="text">
                                            </div>
                                            <div id="employee-emergency-contact-container" class="employee-content">
                                                <h3>Contact Number</h3>
                                                <input id="emergency_contact" name="emergency_contact_number" class="textbox" type="text" maxlength="13">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="employee-button-container">
                                        <button type="button" id="add-cancel-btn" class="cancel-employee-button" >CANCEL</button>
                                        <input type="submit" id="submit-btn" class="submit-employee-button" value="SUBMIT"/>                 
                                    </div>
                                </div>              
                            </div>
                        </div>
                        </form>
                    </div>
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
                                    <div class="dropdown-menu-option" id="myDropdown">
                                        <a class="dropdown-item-option view-button" href="#" data-employee-id="{{ $employee->id }}">View</a>
                                        @if ($employee->status === 'active')
                                            <a class="dropdown-item-option deactivate-button" href="#" data-employee-id="{{ $employee->id }}">Deactivate</a>
                                        @elseif ($employee->status === 'inactive')
                                            <a class="dropdown-item-option activate-button" href="#" data-employee-id="{{ $employee->id }}">Activate</a>
                                        @endif
                                        
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
    <div id="deactivateEmployee{{ $employee->id }}" class="deactivate-modal-container">
        <div class="deactivate-modal-content">
            <img src="images/Warning.png">
            <div class ="deactivate-content">
                <p class="confirm-text">CONFIRM</p>
                <p class="confirm-sub-text">Are you sure you want to deactivate this user?</p>
            </div>
            <div class="deactivate-button-container">
                <button class="cancel-deactivate-button">Cancel</button>
                <form action="/employeetable-deactivate/{{ $employee->id }}" method="POST">
                    @csrf
                    <button type="submit" class="confirm-deactivate-button">Confirm</button>
                </form>              
            </div>
        </div>
    </div>
    @endforeach
    @endif

    @if($employees)
    @foreach ($employees as $employee)
    <div id="activateEmployee{{ $employee->id }}" class="activate-modal-container">
        <div class="activate-modal-content">
            <img src="images/Confirm.png">
            <div class ="deactivate-content">
                <p class="confirm-text">CONFIRM</p>
                <p class="confirm-sub-text">Are you sure you want to activate this user?</p>
            </div>
            <div class="activate-button-container">
                <button class="cancel-activate-button">Cancel</button>
                <form action="/employeetable-activate/{{ $employee->id }}" method="POST">
                    @csrf
                    <button type="submit" class="confirm-activate-button">Confirm</button>
                </form>              
            </div>
        </div>
    </div>
    @endforeach
    @endif

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
                    <div class="employee-details-header"> Emergency Contact</div>
                    <hr id="employee-details-divider"class="solid">
                    <div class="employee-details-content">
                        <div class="employee-details">
                            <div id="employee-emergency-name-container" class="employee-content">
                                <h3>Name</h3>
                                <p>
                                    @if ($employee->emergency_contact_name)
                                        {{ $employee->emergency_contact_name }}
                                    @else
                                        Not Available
                                    @endif
                                </p>
                            </div>
                            <div id="employee-emergency-relationship-container" class="employee-content">
                                <h3>Relationship</h3>
                                <p>
                                    @if ($employee->emergency_contact_relationship)
                                        {{ $employee->emergency_contact_relationship }}
                                    @else
                                        Not Available
                                    @endif
                                </p>
                            </div>
                            <div id="employee-emergency-contact-container" class="employee-content">
                                <h3>Contact Number</h3>
                                <p>
                                    @if ($employee->emergency_contact_number)
                                        {{ $employee->emergency_contact_number }}
                                    @else
                                        Not Available
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="employee-button-container">
                        <button class="cancel-employee-button">CANCEL</button>
                        <button class="edit-employee-button" data-employee-id="{{ $employee->id }}">EDIT</button>         
                        <div id="editModal{{ $employee->id }}" class="edit-modal-container" >
                            <div class="edit-modal-content">
                                <div class="edit-modal-header">
                                    <h3 class="modal-header">EDIT PROFILE</h3>
                                    <img class="modal-logo" src="images/ayahtek-logo.png" alt="Logo">
                                </div>
                                <div id="employee-details-row-one" class="employee-details-container">
                                    <div class="employee-details-row">
                                        <div class="employee-details-header"> Employee Details</div>
                                        <hr id="employee-details-divider"class="solid">
                                        <form method="POST" action="/employee-update/{{ $employee->id }}">
                                        @csrf
                                            <div class="employee-details-content">
                                                <div class="employee-details">
                                                    <div id="employee-id-container" class="employee-content">
                                                        <h3>Employee ID</h3>
                                                        <p name="id" class="employee-id">EMP-{{ str_pad($employee->id, 3, '0', STR_PAD_LEFT) }}</p>
                                                    </div>
                                                    <div id="employee-name-container" class="employee-content">
                                                        <h3>Employee Name:</h3>
                                                        <input name="name" class="textbox" type="text" value="{{ $employee->name }}" required>
                                                    </div>
                                                    <div id="employee-birthday-container" class="employee-content">
                                                        <h3>Birthday</h3>
                                                        <input name="birthday" class="date" type="date" value="{{ ($employee->birthday) }}" required>
                                                    </div>
                                                    <div id="employee-gender-container" class="employee-content">
                                                        <h3>Gender</h3>
                                                        <select name="gender" id="gender">
                                                            <option value="{{ $employee->gender }}">{{ $employee->gender }}</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                    <div id="employee-contact-container" class="employee-content">
                                                        <h3>Contact number</h3>
                                                        <input id="e_contact" name="contact" class="textbox" type="text" value="{{ $employee->contact }}" required>
                                                    </div>
                                                </div>
                                                <div class="employee-details">
                                                    <div id="employee-id-container" class="employee-content">
                                                        <h3>Salary</h3>
                                                        <input id="e_salary" name="salary" class="textbox" type="text" value="{{ $employee->salary }}" required>
                                                    </div>
                                                    <div id="employee-name-container" class="employee-content">
                                                        <h3>SSS Number</h3>
                                                        <input id="e_sss_number" name="sss_number" class="textbox" type="text" value="{{ $employee->sss_number }}" required>
                                                    </div>
                                                    <div id="employee-birthday-container" class="employee-content">
                                                        <h3>Philhealth Number</h3>
                                                        <input id="e_philhealth_number" name="philhealth_number" class="textbox" type="text" value="{{ $employee->philhealth_number }}" required>
                                                    </div>
                                                    <div id="employee-gender-container" class="employee-content">
                                                        <h3>TIN</h3>
                                                        <input id="e_tin" name="tin" class="textbox" type="text" value="{{ $employee->tin }}" required>
                                                    </div>
                                                    <div id="employee-contact-container" class="employee-content">
                                                        <h3>Date Added</h3>
                                                        <p>{{ $employee->created_at->format('F d, Y')  }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div id="employee-details-row-two" class="employee-details-row">
                                            <div class="employee-details-header"> Emergency Contact</div>
                                            <hr id="employee-details-divider"class="solid">
                                            <div class="employee-details-content">
                                                <div class="employee-details-content">
                                                    <div class="employee-details">
                                                        <div id="employee-emergency-name-container" class="employee-content">
                                                            <h3>Name</h3>
                                                            <input name="emergency_contact_name" class="textbox" type="text" value="{{ $employee->emergency_contact_name }}">
                                                        </div>
                                                        <div id="employee-emergency-relationship-container" class="employee-content">
                                                            <h3>Relationship</h3>
                                                            <input name="emergency_contact_relationship" class="textbox" type="text" value="{{ $employee->emergency_contact_relationship }}">
                                                        </div>
                                                        <div id="employee-emergency-contact-container" class="employee-content">
                                                            <h3>Contact Number</h3>
                                                            <input id="e_emergency_contact" name="emergency_contact_number" class="textbox" type="text" value="{{ $employee->emergency_contact_number }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="employee-button-container">  
                                                <button type="button" id="edit-cancel-btn" class="cancel-employee-button">CANCEL</button>
                                                <button type="button" id="delete-btn" class="delete-employee-button"  data-employee-id="{{ $employee->id }}">DELETE</button>  
                                                <input type="submit" id="save-btn" class="save-employee-button" value="SAVE"/> 
                                                </form>                                        
                                            </div>
                                            
                                            <div id="deleteEmployee{{ $employee->id }}" class="delete-modal-container">
                                                <div class="delete-modal-content">
                                                    <img src="images/Warning.png">
                                                    <div class ="delete-content">
                                                        <p class="confirm-text">CONFIRM</p>
                                                        <p class="confirm-sub-text">Are you sure you want to delete this user?</p>
                                                    </div>
                                                    <div class="delete-button-container">
                                                        <button class="cancel-delete-button">Cancel</button>
                                                        <form method="POST" action="/employee-delete/{{ $employee->id }}" id="delete-form">
                                                            @csrf
                                                            <button type="submit" class="confirm-delete-button">Confirm</button>
                                                        </form>              
                                                    </div>
                                                </div>
                                            </div>

                                        </div>              
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>               
            </div>
        </div>
    </div>
    @endforeach
    @endif  
</div>

@endsection