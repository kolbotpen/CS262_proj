@extends('layouts.master-workspace')
@section('content')

<div class="container">
  <h1 class="mt-4 mb-4">Team</h1>

  {{-- CONTAINER 1 --}}
  <div class="container bg-transparent p-0 rounded container-border">
    <div class="table-border rounded mb-5" style="overflow: hidden;">
        <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th class="align-middle">TEAM 1</th>
                    <th class="align-middle"></th>
                    <th class="align-middle text-center">
                        <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                            <a class="btn btn-success bg-green-gradient" href="team-add-member" role="button">
                                <img class="icon me-2" src="assets/images/icon-user-add.svg" draggable="false">Add Member
                            </a>
                        </div>
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
                        <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                            <a class="btn btn-secondary" href="mailto:test@gmail.com" role="button">
                                <img class="icon me-2" src="assets/images/icon-mail.svg" draggable="false">
                            </a>
                            <a class="btn btn-danger" href="#" role="button">
                                <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
                            </a>
                        </div>
                    </td>
                </tr>
                {{-- Member 2 --}}
                <tr>
                    <td class="align-middle">2.</td>
                    <td class="align-middle">Clark Kent</td>
                    <td class="align-middle text-center">
                        <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                            <a class="btn btn-secondary" href="mailto:test@gmail.com" role="button">
                                <img class="icon me-2" src="assets/images/icon-mail.svg" draggable="false">
                            </a>
                            <a class="btn btn-danger" href="#" role="button">
                                <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
                            </a>
                        </div>
                    </td>
                </tr>
                {{-- Member 3 --}}
                <tr>
                    <td class="align-middle">3.</td>
                    <td class="align-middle">John Doe</td>
                    <td class="align-middle text-center">
                        <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                            <a class="btn btn-secondary" href="mailto:test@gmail.com" role="button">
                                <img class="icon me-2" src="assets/images/icon-mail.svg" draggable="false">
                            </a>
                            <a class="btn btn-danger" href="#" role="button">
                                <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
                            </a>
                        </div>
                    </td>
                </tr>
                {{-- Member 4 --}}
                <tr>
                    <td class="align-middle">4.</td>
                    <td class="align-middle">Ben Dover</td>
                    <td class="align-middle text-center">
                        <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                            <a class="btn btn-secondary" href="mailto:test@gmail.com" role="button">
                                <img class="icon me-2" src="assets/images/icon-mail.svg" draggable="false">
                            </a>
                            <a class="btn btn-danger" href="#" role="button">
                                <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
                            </a>
                        </div>
                    </td>
                </tr>
                {{-- Member 5 --}}
                <tr>
                    <td class="align-middle">5.</td>
                    <td class="align-middle">Tony Stark</td>
                    <td class="align-middle text-center">
                        <div class="btn-group table-border" style="background-color: #303030" role="group" aria-label="Button group">
                            <a class="btn btn-secondary" href="mailto:test@gmail.com" role="button">
                                <img class="icon me-2" src="assets/images/icon-mail.svg" draggable="false">
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