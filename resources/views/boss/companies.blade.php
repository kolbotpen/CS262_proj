@extends('layouts.master-workspace')
@section('content')

<div class="container">
    <h1 class="mt-4 mb-4">Companies</h1>

    {{-- CONTAINER 1 --}}
    <div class="container bg-transparent p-0 rounded container-border">
        {{-- COMPANY 1 --}}

        <div class="table-border rounded mb-5" style="overflow: hidden;">
            <table class="table table-company-name m-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th class="align-middle">OURDEN co.ltd</th>
                        <th class="align-middle"></th>
                        <th class="align-middle text-center">
                            <div class="btn-group table-border" style="background-color: #303030" role="group"
                                aria-label="Button group">
                                <a class="btn btn-success bg-green-gradient" href="team-add" role="button">
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

                    @foreach ($teams as $team)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $team->name }}</td>
                            <td class="align-middle text-center">
                                <div class="btn-group table-border" role="group" aria-label="Button group">
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


        {{-- COMPANY 2 --}}
        <div class="table-border rounded mb-5" style="overflow: hidden;">
            <table class="table table-company-name m-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th class="align-middle">OURDEN co.ltd</th>
                        <th class="align-middle"></th>
                        <th class="align-middle text-center">
                            <div class="btn-group table-border" style="background-color: #303030" role="group"
                                aria-label="Button group">
                                <a class="btn btn-success bg-green-gradient" href="#" role="button">
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
                    <tr>
                        <td class="align-middle">1</td>
                        <td class="align-middle">FRONTEND DEVELOPMENT</td>
                        <td class="align-middle text-center">
                            <div class="btn-group table-border" role="group" aria-label="Button group">
                                <a href="team" class="btn btn-secondary">
                                    <img class="icon" src="assets/images/icon-team.svg" draggable="false">
                                </a>
                                <a href="task" class="btn btn-secondary">
                                    <img class="icon" src="assets/images/icon-sidebar-tasks.svg" draggable="false">
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">2</td>
                        <td class="align-middle">API DEVELOPMENT</td>
                        <td class="align-middle text-center">
                            <div class="btn-group table-border" role="group" aria-label="Button group">
                                <a href="team" class="btn btn-secondary">
                                    <img class="icon" src="assets/images/icon-team.svg" draggable="false">
                                </a>
                                <a href="task" class="btn btn-secondary">
                                    <img class="icon" src="assets/images/icon-sidebar-tasks.svg" draggable="false">
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">3</td>
                        <td class="align-middle">BACKEND DEVELOPMENT</td>
                        <td class="align-middle text-center">
                            <div class="btn-group table-border" role="group" aria-label="Button group">
                                <a href="team" class="btn btn-secondary">
                                    <img class="icon" src="assets/images/icon-team.svg" draggable="false">
                                </a>
                                <a href="task" class="btn btn-secondary">
                                    <img class="icon" src="assets/images/icon-sidebar-tasks.svg" draggable="false">
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        {{-- COMPANY 3 --}}
        <div class="table-border rounded mb-5" style="overflow: hidden;">
            <table class="table table-company-name m-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th class="align-middle">OURDEN co.ltd</th>
                        <th class="align-middle"></th>
                        <th class="align-middle text-center">
                            <div class="btn-group table-border" style="background-color: #303030" role="group"
                                aria-label="Button group">
                                <a class="btn btn-success bg-green-gradient" href="#" role="button">
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
                    <tr>
                        <td class="align-middle">1</td>
                        <td class="align-middle">FRONTEND DEVELOPMENT</td>
                        <td class="align-middle text-center">
                            <div class="btn-group table-border" role="group" aria-label="Button group">
                                <a href="team" class="btn btn-secondary">
                                    <img class="icon" src="assets/images/icon-team.svg" draggable="false">
                                </a>
                                <a href="task" class="btn btn-secondary">
                                    <img class="icon" src="assets/images/icon-sidebar-tasks.svg" draggable="false">
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">2</td>
                        <td class="align-middle">API DEVELOPMENT</td>
                        <td class="align-middle text-center">
                            <div class="btn-group table-border" role="group" aria-label="Button group">
                                <a href="team" class="btn btn-secondary">
                                    <img class="icon" src="assets/images/icon-team.svg" draggable="false">
                                </a>
                                <a href="task" class="btn btn-secondary">
                                    <img class="icon" src="assets/images/icon-sidebar-tasks.svg" draggable="false">
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">3</td>
                        <td class="align-middle">BACKEND DEVELOPMENT</td>
                        <td class="align-middle text-center">
                            <div class="btn-group table-border" role="group" aria-label="Button group">
                                <a href="team" class="btn btn-secondary">
                                    <img class="icon" src="assets/images/icon-team.svg" draggable="false">
                                </a>
                                <a href="task" class="btn btn-secondary">
                                    <img class="icon" src="assets/images/icon-sidebar-tasks.svg" draggable="false">
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