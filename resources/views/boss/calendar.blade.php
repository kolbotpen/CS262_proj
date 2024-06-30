@extends('layouts.master-workspace')
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
<link rel="stylesheet" href="{{asset ('assets/css/calendar.css')}}">

<div class="container">
    {{-- BREADCRUMB --}}
    <div class="breadcrumb mt-4 mb-4">
        <a href="#" class="breadcrumb-link">Calendar</a>
    </div>

    <div id='calendar'></div>
    
    
</div>


{{-- <script src="{{ asset('assets/js/calendar.js')}}"></script> --}}

@stop