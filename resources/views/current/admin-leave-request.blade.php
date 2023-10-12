@extends('layouts.main-base')

@section('script')
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
                    <button class="add-employee-button">Add Leave Request</button>
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
@endsection