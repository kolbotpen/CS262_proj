@extends('layouts.master-workspace')
@section('content')

<div class="container">
    <div class="breadcrumb mt-4 mb-4">
        <a href="/companies" class="breadcrumb-link">Companies</a>
        <i class="arrow-right"></i>
        <a href="#" class="breadcrumb-link">Task</a>
    </div>

    {{-- CONTAINER 1 --}}
    <div class="container bg-transparent p-0 rounded container-border">
        <div class="table-container-scroll table-border rounded mb-5">
            <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th class="align-middle">{{ $team->name }}</th>
                        <th class="align-middle"></th>
                        <th class="align-middle text-center">
                            <div class="btn-group table-border th-btn" style="background-color: #303030" role="group"
                                aria-label="Button group">
                                <!-- <a class="btn btn-secondary" href="task-insert" role="button">
                                <img class="icon me-2" src="{{asset('assets/images/icon-add.svg')}}" draggable="false">Add Task
                            </a> -->
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            <table class="table m-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th class="align-middle">Tasks</th>
                        <th class="align-middle">Assigned To</th>
                        <th class="align-middle">Due Date</th>
                        <th class="align-middle text-center">Priority</th>
                        <th class="align-middle text-center">Progress</th>
                        <th class="align-middle text-center w-16">Options</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Task 1 --}}
                    @if($tasks->where('team_id', $team->id)->isNotEmpty())
                        @foreach($tasks->where('team_id', $team->id) as $task)
                            {{-- Display each task --}}
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->assigned_to }}</td>
                                <td>{{ $task->due_date}}</td>
                                <td class="text-center">
                                    <div
                                        class="pill {{ $task->priority == 'Low' ? 'pill-green' : ($task->priority == 'Medium' ? 'pill-yellow' : 'pill-red') }} center">
                                        {{ $task->priority }}</div>
                                </td>
                                <td class="text-center">
                                    <div
                                        class="pill {{ $task->progress == 'Completed' ? 'pill-green' : ($task->progress == 'In Progress' ? 'pill-yellow' : '') }} center">
                                        {{ $task->progress }}
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group table-border option-btn" style="background-color: #303030"
                                        role="group" aria-label="Button group">
                                        <a class="btn btn-secondary" href="{{ url('task-details/' . $task->id) }}"
                                            role="button">
                                            <img class="icon mx-auto" src="{{asset('assets/images/icon-view.svg')}}"
                                                draggable="false">
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">No tasks found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>



</div>

@stop