@extends('layouts.master-workspace')
@section('content')

<div class="container">
  <h1 class="mt-4">Assign Tasks</h1>

  {{-- CONTAINER 1 --}}
  <div class="container bg-gray p-4 mb-4 rounded container-border">
    <div class="table-border rounded" style="overflow: hidden;">
        <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th class="align-middle">TEAM 1</th>
                    <th class="align-middle"></th>
                    <th class="align-middle text-center">
                        <button class="btn button-gray d-inline-flex align-items-center">
                            <img class="icon me-2 mt-1" src="assets/images/icon-add.svg" draggable="false">Add Task
                        </button>
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
                    <td class="align-middle text-center"><div class="pill pill-yellow">Medium</div></td>
                    <td class="align-middle text-center"><div class="pill pill-yellow">In-Progress</div></td>
                    <td class="align-middle text-center">
                        <a class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-edit.svg" draggable="false">
                        </a>
                        <a class="btn btn-danger">
                            <img class="icon" src="assets/images/icon-trash.svg" draggable="false">
                        </a>
                    </td>
                </tr>
                {{-- Task 2 --}}
                <tr>
                    <td class="align-middle">Update user documentation</td>
                    <td class="align-middle">Clark Kent</td>
                    <td class="align-middle">Tomorrow</td>
                    <td class="align-middle text-center"><div class="pill pill-yellow">Medium</div></td>
                    <td class="align-middle text-center"><div class="pill pill-yellow">In-Progress</div></td>
                    <td class="align-middle text-center">
                        <a class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-edit.svg" draggable="false">
                        </a>
                        <a class="btn btn-danger">
                            <img class="icon" src="assets/images/icon-trash.svg" draggable="false">
                        </a>
                    </td>
                </tr>
                {{-- Task 3 --}}
                <tr>
                    <td class="align-middle">Test new features</td>
                    <td class="align-middle">John Doe</td>
                    <td class="align-middle">April 24th</td>
                    <td class="align-middle text-center"><div class="pill pill-red">High</div></td>
                    <td class="align-middle text-center"><div class="pill">Not Started</div></td>
                    <td class="align-middle text-center">
                        <a class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-edit.svg" draggable="false">
                        </a>
                        <a class="btn btn-danger">
                            <img class="icon" src="assets/images/icon-trash.svg" draggable="false">
                        </a>
                    </td>
                </tr>
                {{-- Task 4 --}}
                <tr>
                    <td class="align-middle">Fix CSS bugs</td>
                    <td class="align-middle">Ben Dover</td>
                    <td class="align-middle">Today</td>
                    <td class="align-middle text-center"><div class="pill pill-green">Low</div></td>
                    <td class="align-middle text-center"><div class="pill pill-green">Completed</div></td>
                    <td class="align-middle text-center">
                        <a class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-edit.svg" draggable="false">
                        </a>
                        <a class="btn btn-danger">
                            <img class="icon" src="assets/images/icon-trash.svg" draggable="false">
                        </a>
                    </td>
                </tr>
                {{-- Task 5 --}}
                <tr>
                    <td class="align-middle">Reports monthly financial </td>
                    <td class="align-middle">Tony Stark</td>
                    <td class="align-middle">Today</td>
                    <td class="align-middle text-center"><div class="pill pill-green">Low</div></td>
                    <td class="align-middle text-center"><div class="pill pill-green">Completed</div></td>
                    <td class="align-middle text-center">
                        <a class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-edit.svg" draggable="false">
                        </a>
                        <a class="btn btn-danger">
                            <img class="icon" src="assets/images/icon-trash.svg" draggable="false">
                        </a>
                    </td>
                </tr>
                {{-- Task 6 --}}
                <tr>
                    <td class="align-middle">Kill Hydra</td>
                    <td class="align-middle">Clark Kent</td>
                    <td class="align-middle">Tomorrow</td>
                    <td class="align-middle text-center"><div class="pill pill-red">High</div></td>
                    <td class="align-middle text-center"><div class="pill">Not Started</div></td>
                    <td class="align-middle text-center">
                        <a class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-edit.svg" draggable="false">
                        </a>
                        <a class="btn btn-danger">
                            <img class="icon" src="assets/images/icon-trash.svg" draggable="false">
                        </a>
                    </td>
                </tr>
                {{-- Task 7 --}}
                <tr>
                    <td class="align-middle">HTML Design</td>
                    <td class="align-middle">Clark Kent</td>
                    <td class="align-middle">Today</td>
                    <td class="align-middle text-center"><div class="pill pill-green">Low</div></td>
                    <td class="align-middle text-center"><div class="pill pill-green">Completed</div></td>
                    <td class="align-middle text-center">
                        <a class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-edit.svg" draggable="false">
                        </a>
                        <a class="btn btn-danger">
                            <img class="icon" src="assets/images/icon-trash.svg" draggable="false">
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>



</div>

@stop