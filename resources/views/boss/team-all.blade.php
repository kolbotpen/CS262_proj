@extends('layouts.master-workspace')
@section('content')

<div class="container">
    <div class="breadcrumb mt-4 mb-4">
        <a href="/companies" class="breadcrumb-link">Companies</a>
        <i class="arrow-right"></i>
        <a href="#" class="breadcrumb-link">All Teams</a>
    </div>

    @foreach ($teams as $team)
        {{-- Team Container --}}
        <div class="container bg-transparent p-0 rounded container-border">
            {{-- Team Header --}}
            <div class="table-container table-border rounded mb-5">
                <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
                    <thead>
                        <tr>
                            <th class="align-middle">{{ strtoupper($team->name) }}</th> <!-- Replace 'name' with the actual field name for the team name in your database -->
                            <th class="align-middle"></th>
                            <th class="align-middle text-center">
                                <div class="btn-group table-border th-btn" style="background-color: #303030" role="group" aria-label="Button group">
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
                        @foreach ($team->users as $index => $user)
                            <tr>
                                <td class="align-middle">{{ $index + 1 }}</td>
                                <td class="align-middle">{{ $user->name }}</td> <!-- Replace 'name' with the actual field name for the user name in your database -->
                                <td class="align-middle text-center">
                                    <div class="btn-group table-border option-btn" style="background-color: #303030" role="group" aria-label="Button group">
                                        <a class="btn btn-secondary" href="mailto:{{ $user->email }}" role="button"> <!-- Replace 'email' with the actual field name for the user email in your database -->
                                            <img class="icon me-2" src="assets/images/icon-mail.svg" draggable="false">
                                        </a>
                                        <a class="btn btn-danger" href="#" role="button">
                                            <img class="icon me-2" src="assets/images/icon-trash.svg" draggable="false">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach

</div>

@stop
