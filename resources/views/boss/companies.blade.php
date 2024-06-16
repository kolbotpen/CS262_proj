@extends('layouts.master-workspace')
@section('content')

<div class="container">
    {{-- BREADCRUMB --}}
    <div class="breadcrumb mt-4 mb-4">
        <a href="#" class="breadcrumb-link">Companies</a>
    </div>

    {{-- CONTAINER 1 --}}
    <div class="container bg-transparent p-0 rounded container-border">
        {{-- Loop through each company --}}
        @foreach ($companies as $company)
            <div class="table-container table-border rounded mb-5">
                <table class="table table-company-name m-0" style="table-layout: fixed; width: 100%;">
                    <thead>
                        <tr>
                            <th class="align-middle">
                                {{ $company->name }}
                                <a class="ms-2 copy-code" href="javascript:void(0);"
                                    data-code="{{ $company->company_code }}" style="text-decoration: none;"
                                    title="Copy Invite Code">
                                    <code
                                        style="font-family: 'Courier New', Courier, monospace; font-weight: 800; background-color: #202020; padding: 2px 4px; border-radius: 4px; color: #808080;">
                                    {{ $company->company_code }}
                                    </code>
                                </a>
                            </th>
                            <th colspan="2" class="align-middle text-end">
                                <div class="btn-group table-border th-btn" style="background-color: #303030" role="group"
                                    aria-label="Button group">
                                    <a class="btn btn-success bg-green-gradient"
                                        href="{{ url('team-add?company_id=' . $company->id) }}" role="button">
                                        <img class="icon me-2" src="assets/images/icon-team.svg" draggable="false">Add Team
                                    </a>
                                    <a class="btn btn-secondary" href="team-all" role="button">
                                        <img class="icon me-2" src="assets/images/icon-team.svg" draggable="false">All
                                    </a>
                                    <a class="btn btn-secondary" href="task-all" role="button">
                                        <img class="icon me-2" src="assets/images/icon-sidebar-tasks.svg"
                                            draggable="false">All
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
                            <th class="align-middle">Team</th>
                            <th class="align-middle text-center">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Loop through each team of the current company --}}
                        @foreach ($company->teams as $team)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $team->name }}</td>
                                <td class="align-middle text-center">
                                    <div class="btn-group table-border option-btn" role="group" aria-label="Button group">
                                        <a href="team" class="btn btn-secondary">
                                            <img class="icon" src="assets/images/icon-team.svg" draggable="false">
                                        </a>
                                        <a href="task" class="btn btn-secondary">
                                            <img class="icon" src="assets/images/icon-sidebar-tasks.svg" draggable="false">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</div>

<script src="{{asset('assets/js/alert-copy.js')}}"></script>

@stop