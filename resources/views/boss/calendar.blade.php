@extends('layouts.master-workspace')
@section('content')

<div class="container">
    {{-- BREADCRUMB --}}
    <div class="breadcrumb mt-4 mb-4">
        <a href="#" class="breadcrumb-link">Calendar</a>
    </div>

    <div id="calendar" class="mb-5"></div>
    
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
                    description: '{{ $task->description }}',
                    extendedProps: {
                        description1: '{{ $task->priority }}',
                        description2: '{{ $task->progress }}',
                        description3: '{{ $task->description }}',
                        assignedTo: '{{ $task->assignedUser->name }}'
                    }
                },
                @endforeach
            ],
            eventDidMount: function(info) {
                var priorityClass = getPriorityClass(info.event.extendedProps.description1);
                info.el.classList.add(priorityClass); // Add priority class to the event element
                
                var tooltip = new bootstrap.Tooltip(info.el, {
                    title: '<h5>' + info.event.title + '</h5><hr>' + 
                           info.event.extendedProps.description3 + '<br>' + // Description
                           info.event.extendedProps.assignedTo + '<br>' + 
                           '<div class="d-flex justify-content-center align-items-center my-2">' +
                               '<div class="pill ' + priorityClass + '">' + info.event.extendedProps.description1 + '</div>' +
                           '</div>' + // Priority
                           'Progress: ' + info.event.extendedProps.description2 + '<br>' +
                           'Due Date: ' + info.event.start.toISOString().substring(0, 10),
                    html: true,  // Enable HTML content
                    placement: 'top',
                    trigger: 'hover',
                    container: 'body'
                });
            }
        });
        calendar.render();

        function getPriorityClass(priority) {
            switch (priority) {
                case 'High':
                    return 'pill-red';
                case 'Medium':
                    return 'pill-yellow';
                case 'Low':
                    return 'pill-green';
                default:
                    return 'pill-default'; // Default class if none of the above matches
            }
        }
    });
</script>


@stop
