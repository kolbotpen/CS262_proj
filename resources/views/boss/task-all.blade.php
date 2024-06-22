@extends('layouts.master-workspace')
@section('content')

{{-- CONTAINER 1 --}}
<div class="container">
    <div class="breadcrumb mt-4 mb-4">
        <a href="/companies" class="breadcrumb-link">Companies</a>
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
                                <div class="btn-group table-border th-btn" style="background-color: #303030" role="group"
                                    aria-label="Button group">
                                    <a class="btn btn-secondary" href="{{url('task-insert')}}" role="button">
                                        <img class="icon me-2" src="{{asset('assets/images/icon-add.svg')}}"
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
                        <tr>
                            <td class="align-middle">Review Wireframes</td>
                            <td class="align-middle">Barry Allen</td>
                            <td class="align-middle">Today</td>
                            <td class="align-middle text-center">
                                <div class="pill pill-yellow center">Medium</div>
                            </td>
                            <td class="align-middle text-center">
                                <div class="pill pill-yellow center">In-Progress</div>
                            </td>
                            <td class="align-middle text-center">
                                <div class="btn-group table-border option-btn" style="background-color: #303030"
                                    role="group" aria-label="Button group">
                                    <a class="btn btn-secondary" href="task-details-edit" role="button">
                                        <img class="icon me-2" src="{{asset('assets/images/icon-edit.svg')}}" draggable="false">
                                    </a>
                                    <a class="btn btn-danger" href="#" role="button">
                                        <img class="icon me-2" src="{{asset('assets/images/icon-trash.svg')}}" draggable="false">
                                    </a>
                                </div>
                            </td>
                        </tr>
                        {{-- Task 2 --}}
                        <tr>
                            <td class="align-middle">Update user documentation</td>
                            <td class="align-middle">Clark Kent</td>
                            <td class="align-middle">Tomorrow</td>
                            <td class="align-middle text-center">
                                <div class="pill pill-yellow center">Medium</div>
                            </td>
                            <td class="align-middle text-center">
                                <div class="pill pill-yellow center">In-Progress</div>
                            </td>
                            <td class="align-middle text-center">
                                <div class="btn-group table-border option-btn" style="background-color: #303030"
                                    role="group" aria-label="Button group">
                                    <a class="btn btn-secondary" href="task-details-edit" role="button">
                                        <img class="icon me-2" src="{{asset('assets/images/icon-edit.svg')}}" draggable="false">
                                    </a>
                                    <a class="btn btn-danger" href="#" role="button">
                                        <img class="icon me-2" src="{{asset('assets/images/icon-trash.svg')}}" draggable="false">
                                    </a>
                                </div>
                            </td>
                        </tr>
                        {{-- Task 3 --}}
                        <tr>
                            <td class="align-middle">Test new features</td>
                            <td class="align-middle">John Doe</td>
                            <td class="align-middle">April 24th</td>
                            <td class="align-middle text-center">
                                <div class="pill pill-red center">High</div>
                            </td>
                            <td class="align-middle text-center">
                                <div class="pill center">Not Started</div>
                            </td>
                            <td class="align-middle text-center">
                                <div class="btn-group table-border option-btn" style="background-color: #303030"
                                    role="group" aria-label="Button group">
                                    <a class="btn btn-secondary" href="task-details-edit" role="button">
                                        <img class="icon me-2" src="{{asset('assets/images/icon-edit.svg')}}" draggable="false">
                                    </a>
                                    <a class="btn btn-danger" href="#" role="button">
                                        <img class="icon me-2" src="{{asset('assets/images/icon-trash.svg')}}" draggable="false">
                                    </a>
                                </div>
                            </td>
                        </tr>
                        {{-- Task 4 --}}
                        <tr>
                            <td class="align-middle">Fix CSS bugs</td>
                            <td class="align-middle">Ben Dover</td>
                            <td class="align-middle">Today</td>
                            <td class="align-middle text-center">
                                <div class="pill pill-green center">Low</div>
                            </td>
                            <td class="align-middle text-center">
                                <div class="pill pill-green center">Completed</div>
                            </td>
                            <td class="align-middle text-center">
                                <div class="btn-group table-border option-btn" style="background-color: #303030"
                                    role="group" aria-label="Button group">
                                    <a class="btn btn-secondary" href="task-details-edit" role="button">
                                        <img class="icon me-2" src="{{asset('assets/images/icon-edit.svg')}}" draggable="false">
                                    </a>
                                    <a class="btn btn-danger" href="#" role="button">
                                        <img class="icon me-2" src="{{asset('assets/images/icon-trash.svg')}}" draggable="false">
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</div>

@stop