@extends('layouts.master-workspace')
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
<link rel="stylesheet" href="{{asset ('assets/css/calendar.css')}}">

<div class="container">
    {{-- BREADCRUMB --}}
    <div class="breadcrumb mt-4 mb-4">
        <a href="#" class="breadcrumb-link">Calendar</a>
    </div>

    <div class="table-container table-border rounded mb-5" id="calendar">
        <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th class="align-middle" style="width: 33.33%; vertical-align: middle;">
                        <p class="calendar-current-date" style="margin: 0;"></p>
                    </th>
                    <th class="align-middle" style="width: 33.33%; vertical-align: middle;">
                        <div class="calendar-navigation" style="display: flex; justify-content: flex-end; align-items: center;">
                            <div class="d-flex align-items-center">
                                <a id="calendar-today" class="btn btn-link text-white me-3 text-decoration-none">Today</a>
                                <span id="calendar-prev" class="material-symbols-rounded me-2">chevron_left</span>
                                <span id="calendar-next" class="material-symbols-rounded">chevron_right</span>
                            </div>                            
                        </div>
                    </th>
                </tr>
            </thead>
        </table>
    
        <div class="calendar-body">
            <ul class="calendar-weekdays">
                <li>Sun</li>
                <li>Mon</li>
                <li>Tue</li>
                <li>Wed</li>
                <li>Thu</li>
                <li>Fri</li>
                <li>Sat</li>
            </ul>
            <ul class="calendar-dates"></ul>
        </div>
    </div>
    
    
</div>


<script src="{{ asset('assets/js/calendar.js')}}"></script>

@stop