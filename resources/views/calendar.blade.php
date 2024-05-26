@extends('layouts.master-workspace')
@section('content')

<div class="container">
  <h1 class="mt-4">Calendar</h1>

  {{-- CONTAINER 1 --}}
  <div class="container bg-gray p-4 mb-4 rounded container-border">
    <div class="table-border rounded" style="overflow: hidden;">
        <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th class="align-middle">OURDEN co.ltd</th>
                    <th class="align-middle"></th>
                    <th class="align-middle"></th>
                </tr>
            </thead>
        </table>
        <table class="table m-0" style="table-layout: fixed; width: 100%;">
            <tbody>
                <tr>
                    <div id="calendarContainer" class="mt-3">
                        <div id="calendarHeader" class="calendar-header"></div>
                        <div id="calendar" class="calendar"></div>
                    </div>
                </tr>
            </tbody>
        </table>
    </div>
  </div>

  
</div>


<script src="{{ asset('assets/js/calendar.js')}}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script> --}}

@stop