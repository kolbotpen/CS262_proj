@extends('layouts.master-workspace')
@section('content')

{{-- CONTAINER 1 --}}
<div class="container">
    <div class="breadcrumb mt-4 mb-4">
        <a href="#" class="breadcrumb-link">Companies</a>
        <i class="arrow-right"></i>
        <a href="#" class="breadcrumb-link">All Tasks</a>
    </div>

    <div class="container bg-transparent p-0 rounded container-border">
        @foreach($teams as $team)
            {{-- Display each team --}}
            <div class="table-container-scroll table-border rounded mb-5">
                <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
                    <thead>
                        <tr>
                            <th class="align-middle">Team</th>
                            <th class="align-middle">{{ $team->name }}</th>
                            <th class="align-middle text-center">
                                <div class="btn-group table-border th-btn" role="group" aria-label="Button group">
                                    <a class="btn btn-success bg-green-gradient"
                                        href="{{ url('task-insert?team_id=' . $team->id) }}" role="button">
                                        <img class="icon me-2" src="{{ asset('assets/images/icon-add.svg') }}"
                                            draggable="false">Add Task
                                    </a>
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
                        {{-- Iterate over tasks for this team --}}
                        {{-- Task 1 --}}
                        @if($tasks->isNotEmpty())
                            @foreach($tasks->where('team_id', $team->id) as $task)
                                {{-- Display each task --}}
                                <tr>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->assigned_to }}</td>
                                    <td>{{ $task->due_date}}</td>
                                    <td class="text-center">
                                        <div class="pill {{ $task->priority == 'Low' ? 'pill-green' : ($task->priority == 'Medium' ? 'pill-yellow' : 'pill-red') }} center">{{ $task->priority }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="pill {{ $task->progress == 'Completed' ? 'pill-green' : ($task->progress == 'In Progress' ? 'pill-yellow' : '') }} center">
                                            {{ $task->progress }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Task options">
                                            <!-- <button src="{{asset('assets/images/icon-trash.svg')}}" type="button"
                                                class="btn btn-danger"
                                                onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('delete-task-form-{{ $task->id }}').submit();"></button>
                                            <form id="delete-task-form-{{ $task->id }}"
                                                action="{{ route('task.delete', $task->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form> -->
                                        </div>
                                        <div class="btn-group table-border option-btn" style="background-color: #303030"
                                            role="group" aria-label="Button group">
                                            <a class="btn btn-secondary" href="{{ url('task-details/' . $task->id) }}"  role="button">
                                                <img class="icon mx-auto" src="{{asset('assets/images/icon-view.svg')}}"
                                                    draggable="false">
                                            </a>
                                            <a class="btn btn-secondary" href="{{ url('task-details-edit/' . $task->id) }}" role="button">
                                                <img class="icon mx-auto" src="{{asset('assets/images/icon-edit.svg')}}"
                                                    draggable="false">
                                            </a>
                                            <form id="delete-task-form-{{ $task->id }}" action="{{ route('task.delete', $task->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('delete-task-form-{{ $task->id }}').submit();">
                                                <img class="icon mx-auto" src="{{ asset('assets/images/icon-trash.svg') }}" draggable="false">
                                            </button>
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
        @endforeach
    </div>
</div>

@stop