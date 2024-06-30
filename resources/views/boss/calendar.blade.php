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

<script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [
          @foreach($tasks as $task)
            {
              title: '{{ $task->title }}',
              start: '{{ $task->due_date }}',
              description: '{{ $task->priority }} - {{ $task->progress }} - {{ $task->description }}'
            },
          @endforeach
        ]
      });
      calendar.render();
    });
  </script>


{{-- <script src="{{ asset('assets/js/calendar.js')}}"></script> --}}

@stop