@extends('layouts.master-workspace')
@section('content')

{{-- CONTAINER 1 --}}
<div class="container">
    <h1 class="mt-4 mb-4">Task (All)</h1>

    <div class="container bg-transparent p-0 rounded container-border">
        {{-- Team 1 --}}
        <div class="table-border rounded mb-5" style="overflow: hidden;">
            <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th class="align-middle">TEAM 1</th>
                        <th class="align-middle">FRONTEND DEVELOPEMENT</th>
                        <th class="align-middle text-center">
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-insert" role="button">
                                    <img class="icon me-2" src="assets/images/icon-add.svg" draggable="false">Add Task
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
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
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
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
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
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
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
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
                                </a>
                            </div>
                        </td>
                    </tr>
                    {{-- Task 5 --}}
                    <tr>
                        <td class="align-middle">Reports monthly financial </td>
                        <td class="align-middle">Tony Stark</td>
                        <td class="align-middle">Today</td>
                        <td class="align-middle text-center">
                            <div class="pill pill-green center">Low</div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="pill pill-green center">Completed</div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
                                </a>
                            </div>
                        </td>
                    </tr>
                    {{-- Task 6 --}}
                    <tr>
                        <td class="align-middle">Kill Hydra</td>
                        <td class="align-middle">Clark Kent</td>
                        <td class="align-middle">Tomorrow</td>
                        <td class="align-middle text-center">
                            <div class="pill pill-red center">High</div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="pill center">Not Started</div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
                                </a>
                            </div>
                        </td>
                    </tr>
                    {{-- Task 7 --}}
                    <tr>
                        <td class="align-middle">HTML Design</td>
                        <td class="align-middle">Clark Kent</td>
                        <td class="align-middle">Today</td>
                        <td class="align-middle text-center">
                            <div class="pill pill-green center">Low</div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="pill pill-green center">Completed</div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Team 2 --}}
        <div class="table-border rounded mb-5" style="overflow: hidden;">
            <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th class="align-middle">TEAM 2</th>
                        <th class="align-middle">API DEVELOPEMENT</th>
                        <th class="align-middle text-center">
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-insert" role="button">
                                    <img class="icon me-2" src="assets/images/icon-add.svg" draggable="false">Add Task
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
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
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
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
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
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
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
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
                                </a>
                            </div>
                        </td>
                    </tr>
                    {{-- Task 5 --}}
                    <tr>
                        <td class="align-middle">Reports monthly financial </td>
                        <td class="align-middle">Tony Stark</td>
                        <td class="align-middle">Today</td>
                        <td class="align-middle text-center">
                            <div class="pill pill-green center">Low</div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="pill pill-green center">Completed</div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
                                </a>
                            </div>
                        </td>
                    </tr>
                    {{-- Task 6 --}}
                    <tr>
                        <td class="align-middle">Kill Hydra</td>
                        <td class="align-middle">Clark Kent</td>
                        <td class="align-middle">Tomorrow</td>
                        <td class="align-middle text-center">
                            <div class="pill pill-red center">High</div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="pill center">Not Started</div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
                                </a>
                            </div>
                        </td>
                    </tr>
                    {{-- Task 7 --}}
                    <tr>
                        <td class="align-middle">HTML Design</td>
                        <td class="align-middle">Clark Kent</td>
                        <td class="align-middle">Today</td>
                        <td class="align-middle text-center">
                            <div class="pill pill-green center">Low</div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="pill pill-green center">Completed</div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Team 3 --}}
        <div class="table-border rounded mb-5" style="overflow: hidden;">
            <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th class="align-middle">TEAM 3</th>
                        <th class="align-middle">BACKEND DEVELOPEMENT</th>
                        <th class="align-middle text-center">
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-insert" role="button">
                                    <img class="icon me-2" src="assets/images/icon-add.svg" draggable="false">Add Task
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
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
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
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
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
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
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
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
                                </a>
                            </div>
                        </td>
                    </tr>
                    {{-- Task 5 --}}
                    <tr>
                        <td class="align-middle">Reports monthly financial </td>
                        <td class="align-middle">Tony Stark</td>
                        <td class="align-middle">Today</td>
                        <td class="align-middle text-center">
                            <div class="pill pill-green center">Low</div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="pill pill-green center">Completed</div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
                                </a>
                            </div>
                        </td>
                    </tr>
                    {{-- Task 6 --}}
                    <tr>
                        <td class="align-middle">Kill Hydra</td>
                        <td class="align-middle">Clark Kent</td>
                        <td class="align-middle">Tomorrow</td>
                        <td class="align-middle text-center">
                            <div class="pill pill-red center">High</div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="pill center">Not Started</div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
                                </a>
                            </div>
                        </td>
                    </tr>
                    {{-- Task 7 --}}
                    <tr>
                        <td class="align-middle">HTML Design</td>
                        <td class="align-middle">Clark Kent</td>
                        <td class="align-middle">Today</td>
                        <td class="align-middle text-center">
                            <div class="pill pill-green center">Low</div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="pill pill-green center">Completed</div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                                <a class="btn btn-secondary" href="task-details-edit" role="button">
                                    <img class="icon me-2" src="assets/images/icon-edit.svg" draggable="false">
                                </a>
                                <a class="btn btn-danger" href="#" role="button">
                                    <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop