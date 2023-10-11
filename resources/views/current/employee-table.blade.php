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
    <div id="viewModal" class="view-modal-container" >
        <div class="view-modal-content">
            <div class="view-modal-header">
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
                                <h3>Employee ID</h3>
                                <p class="employee-id"></p>
                            </div>
                            <div id="employee-name-container" class="employee-content">
                                <h3>Employee Name</h3>
                                <p class="employee-name"></p>
                            </div>
                            <div id="employee-birthday-container" class="employee-content">
                                <h3>Birthday</h3>
                                <p class="employee-birthday"></p>
                            </div>
                            <div id="employee-gender-container" class="employee-content">
                                <h3>Gender</h3>
                                <p class="employee-gender"></p>
                            </div>
                            <div id="employee-contact-container" class="employee-content">
                                <h3>Contact number</h3>
                                <p class="employee-contact"></p>
                            </div>
                        </div>
                        <div class="employee-details">
                            <div id="employee-id-container" class="employee-content">
                                <h3>Salary</h3>
                                <p>20000</p>
                            </div>
                            <div id="employee-name-container" class="employee-content">
                                <h3>SSS Number</h3>
                                <p>74-5635493-8</p>
                            </div>
                            <div id="employee-birthday-container" class="employee-content">
                                <h3>Philhealth Number</h3>
                                <p>91-871187398-9</p>
                            </div>
                            <div id="employee-gender-container" class="employee-content">
                                <h3>TIN</h3>
                                <p>417-741-554-663</p>
                            </div>
                            <div id="employee-contact-container" class="employee-content">
                                <h3>Date Added</h3>
                                <p>March 14, 2023</p>
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
                        <button class="edit-employee-button">Edit</button>                 
                    </div>
                </div>              
            </div>
        </div>
    </div>
    
@endsection