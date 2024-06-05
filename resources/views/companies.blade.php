@extends('layouts.master-workspace')
@section('content')

<div class="container">
  <h1 class="mt-4">Companies</h1>

  {{-- CONTAINER 1 --}}
  <div class="container bg-gray p-4 mb-4 rounded container-border">
    <div class="table-border rounded" style="overflow: hidden;">
        <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th class="align-middle">OURDEN co.ltd</th>
                    <th class="align-middle"></th>
                    <th class="align-middle text-center">
                        <a class="btn button-green-gradient d-inline-flex align-items-center">
                            <img class="icon me-2" src="assets/images/icon-team.svg" draggable="false">Add Team
                        </a>
                        <a class="btn button-gray d-inline-flex align-items-center">
                            <img class="icon me-2" src="assets/images/icon-team.svg" draggable="false">All
                        </a>
                        <a class="btn button-gray d-inline-flex align-items-center">
                            <img class="icon me-2" src="assets/images/icon-sidebar-tasks.svg" draggable="false">All
                        </a>
                    </th>
                </tr>
            </thead>
        </table>
        <table class="table m-0" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th class="align-middle">No.</th>
                    <th class="align-middle">Team</th>
                    <th class="align-middle text-center w-16">Options</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">1</td>
                    <td class="align-middle">Front-end Developer</td>
                    <td class="align-middle text-center">
                        <a href="team" class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-team.svg" draggable="false">
                        </a>
                        <a href="tasks" class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-sidebar-tasks.svg" draggable="false">
                        </a>                         
                    </td>
                </tr>
                <tr>
                    <td class="align-middle">2</td>
                    <td class="align-middle">API Developer</td>
                    <td class="align-middle text-center">
                        <a href="team" class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-team.svg" draggable="false">
                        </a>
                        <a href="tasks" class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-sidebar-tasks.svg" draggable="false">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle">3</td>
                    <td class="align-middle">Back-end Developer</td>
                    <td class="align-middle text-center">
                        <a href="team" class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-team.svg" draggable="false">
                        </a>
                        <a href="tasks" class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-sidebar-tasks.svg" draggable="false">
                        </a>   
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>

  {{-- CONTAINER 2 --}}
  <div class="container bg-gray p-4 mb-4 rounded container-border">
    <div class="table-border rounded" style="overflow: hidden;">
        <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th class="align-middle">SMOS Enterprise</th>
                    <th class="align-middle"></th>
                    <th class="align-middle text-center">
                        <button class="btn button-gray d-inline-flex align-items-center">
                            <img class="icon me-2" src="assets/images/icon-team.svg" draggable="false">Add Team
                        </button>
                    </th>
                </tr>
            </thead>
        </table>
        <table class="table m-0" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th class="align-middle">No.</th>
                    <th class="align-middle">Team</th>
                    <th class="align-middle text-center w-16">Options</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">1</td>
                    <td class="align-middle">Front-end Developer</td>
                    <td class="align-middle text-center">
                        <a href="team" class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-team.svg" draggable="false">
                        </a>
                        <a href="tasks" class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-sidebar-tasks.svg" draggable="false">
                        </a>   
                    </td>
                </tr>
                <tr>
                    <td class="align-middle">2</td>
                    <td class="align-middle">API Developer</td>
                    <td class="align-middle text-center">
                        <a href="team" class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-team.svg" draggable="false">
                        </a>
                        <a href="tasks" class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-sidebar-tasks.svg" draggable="false">
                        </a>   
                    </td>
                </tr>
                <tr>
                    <td class="align-middle">3</td>
                    <td class="align-middle">Back-end Developer</td>
                    <td class="align-middle text-center">
                        <a href="team" class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-team.svg" draggable="false">
                        </a>
                        <a href="tasks" class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-sidebar-tasks.svg" draggable="false">
                        </a>   
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>

  {{-- CONTAINER 3 --}}
  <div class="container bg-gray p-4 mb-4 rounded container-border">
    <div class="table-border rounded" style="overflow: hidden;">
        <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th class="align-middle">Vault-Tec</th>
                    <th class="align-middle"></th>
                    <th class="align-middle text-center">
                        <a class="btn button-gray d-inline-flex align-items-center">
                            <img class="icon me-2" src="assets/images/icon-team.svg" draggable="false">Add Team
                        </a>
                    </th>
                </tr>
            </thead>
        </table>
        <table class="table m-0" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th class="align-middle">No.</th>
                    <th class="align-middle">Team</th>
                    <th class="align-middle text-center w-16">Options</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">1</td>
                    <td class="align-middle">Lead Engineer</td>
                    <td class="align-middle text-center">
                        <a href="team" class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-team.svg" draggable="false">
                        </a>
                        <a href="tasks" class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-sidebar-tasks.svg" draggable="false">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle">2</td>
                    <td class="align-middle">Overseer</td>
                    <td class="align-middle text-center">
                        <a href="team" class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-team.svg" draggable="false">
                        </a>
                        <a href="tasks" class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-sidebar-tasks.svg" draggable="false">
                        </a>   
                    </td>
                </tr>
                <tr>
                    <td class="align-middle">3</td>
                    <td class="align-middle">Advertising</td>
                    <td class="align-middle text-center">
                        <a href="team" class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-team.svg" draggable="false">
                        </a>
                        <a href="tasks" class="btn btn-secondary">
                            <img class="icon" src="assets/images/icon-sidebar-tasks.svg" draggable="false">
                        </a>   
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>


</div>

@stop