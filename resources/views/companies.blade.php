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
                        <button class="btn button-gray d-inline-flex align-items-center">
                            <img class="icon me-2" src="assets/images/icon-user-add.svg" draggable="false">Add Member
                        </button>
                    </th>
                </tr>
            </thead>
        </table>
        <table class="table m-0" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th class="align-middle">Team Members</th>
                    <th class="align-middle">Titles</th>
                    <th class="align-middle text-center w-16">Options</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">Visoth</td>
                    <td class="align-middle">Front-end Developer</td>
                    <td class="align-middle text-center">
                        <button class="btn btn-primary">
                            <img class="icon" src="assets/images/icon-mail.svg" draggable="false">Message
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle">Kolbot</td>
                    <td class="align-middle">API Developer</td>
                    <td class="align-middle text-center">
                        <button class="btn btn-primary">
                            <img class="icon" src="assets/images/icon-mail.svg" draggable="false">Message
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle">Soponloe</td>
                    <td class="align-middle">Back-end Developer</td>
                    <td class="align-middle text-center">
                        <button class="btn btn-primary">
                            <img class="icon" src="assets/images/icon-mail.svg" draggable="false">Message
                        </button>
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
                            <img class="icon me-2" src="assets/images/icon-user-add.svg" draggable="false">Add Member
                        </button>
                    </th>
                </tr>
            </thead>
        </table>
        <table class="table m-0" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th class="align-middle">Team Members</th>
                    <th class="align-middle">Titles</th>
                    <th class="align-middle text-center w-16">Options</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">Adjective Vitou</td>
                    <td class="align-middle">Front-end Developer</td>
                    <td class="align-middle text-center">
                        <button class="btn btn-primary">
                            <img class="icon" src="assets/images/icon-mail.svg" draggable="false">Message
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle">John Xina</td>
                    <td class="align-middle">API Developer</td>
                    <td class="align-middle text-center">
                        <button class="btn btn-primary">
                            <img class="icon" src="assets/images/icon-mail.svg" draggable="false">Message
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle">Lebron James</td>
                    <td class="align-middle">Back-end Developer</td>
                    <td class="align-middle text-center">
                        <button class="btn btn-primary">
                            <img class="icon" src="assets/images/icon-mail.svg" draggable="false">Message
                        </button>
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
                        <button class="btn button-gray d-inline-flex align-items-center">
                            <img class="icon me-2" src="assets/images/icon-user-add.svg" draggable="false">Add Member
                        </button>
                    </th>
                </tr>
            </thead>
        </table>
        <table class="table m-0" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th class="align-middle">Team Members</th>
                    <th class="align-middle">Titles</th>
                    <th class="align-middle text-center w-16">Options</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">Robert House</td>
                    <td class="align-middle">Lead Engineer</td>
                    <td class="align-middle text-center">
                        <button class="btn btn-primary">
                            <img class="icon" src="assets/images/icon-mail.svg" draggable="false">Message
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle">Tim Cain</td>
                    <td class="align-middle">Overseer</td>
                    <td class="align-middle text-center">
                        <button class="btn btn-primary">
                            <img class="icon" src="assets/images/icon-mail.svg" draggable="false">Message
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle">Cooper Howard</td>
                    <td class="align-middle">Advertising</td>
                    <td class="align-middle text-center">
                        <button class="btn btn-primary">
                            <img class="icon" src="assets/images/icon-mail.svg" draggable="false">Message
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>


</div>

@stop