@extends('layouts.master-workspace')
@section('content')

<div class="container">
  <h1 class="mt-4">Tasks</h1>

  {{-- CONTAINER 1 --}}
  <div class="container bg-gray p-4 mb-4 rounded container-border">
    <div class="table-border rounded" style="overflow: hidden;">
        <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th class="align-middle">TEAM 1</th>
                    <th class="align-middle"></th>
                    <th class="align-middle text-center">
                        <a class="btn button-gray d-inline-flex align-items-center" href="task-insert">
                            <img class="icon me-2 mt-1" src="assets/images/icon-user-add.svg" draggable="false">Add Member
                        </a>
                    </th>
                </tr>
            </thead>
        </table>
        <table class="table m-0" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th class="align-middle">No.</th>
                    <th class="align-middle">Member</th>
                    <th class="align-middle text-center w-16">Options</th>
                </tr>
            </thead>
            <tbody>
                {{-- Member 1 --}}
                <tr>
                    <td class="align-middle">1.</td>
                    <td class="align-middle">Barry Allen</td>
                    <td class="align-middle text-center">
                        <a class="btn btn-secondary" href="#">
                            <img class="icon" src="assets/images/icon-mail.svg" draggable="false">
                        </a>
                        <a class="btn btn-danger">
                            <img class="icon" src="assets/images/icon-trash.svg" draggable="false">
                        </a>
                    </td>
                </tr>
                {{-- Member 2 --}}
                <tr>
                    <td class="align-middle">2.</td>
                    <td class="align-middle">Clark Kent</td>
                    <td class="align-middle text-center">
                        <a class="btn btn-secondary" href="#">
                            <img class="icon" src="assets/images/icon-mail.svg" draggable="false">
                        </a>
                        <a class="btn btn-danger">
                            <img class="icon" src="assets/images/icon-trash.svg" draggable="false">
                        </a>
                    </td>
                </tr>
                {{-- Member 3 --}}
                <tr>
                    <td class="align-middle">3.</td>
                    <td class="align-middle">John Doe</td>
                    <td class="align-middle text-center">
                        <a class="btn btn-secondary" href="#">
                            <img class="icon" src="assets/images/icon-mail.svg" draggable="false">
                        </a>
                        <a class="btn btn-danger">
                            <img class="icon" src="assets/images/icon-trash.svg" draggable="false">
                        </a>
                    </td>
                </tr>
                {{-- Member 4 --}}
                <tr>
                    <td class="align-middle">4.</td>
                    <td class="align-middle">Ben Dover</td>
                    <td class="align-middle text-center">
                        <a class="btn btn-secondary" href="#">
                            <img class="icon" src="assets/images/icon-mail.svg" draggable="false">
                        </a>
                        <a class="btn btn-danger">
                            <img class="icon" src="assets/images/icon-trash.svg" draggable="false">
                        </a>
                    </td>
                </tr>
                {{-- Member 5 --}}
                <tr>
                    <td class="align-middle">5.</td>
                    <td class="align-middle">Tony Stark</td>
                    <td class="align-middle text-center">
                        <a class="btn btn-secondary" href="#">
                            <img class="icon" src="assets/images/icon-mail.svg" draggable="false">
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