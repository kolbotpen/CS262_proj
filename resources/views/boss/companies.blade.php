@extends('layouts.master-workspace')
@section('content')

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="container">
    {{-- BREADCRUMB --}}
    <div class="breadcrumb mt-4 mb-4">
        <a href="#" class="breadcrumb-link">Companies</a>
    </div>

    {{-- Companies Created by User --}}
    <div class="container bg-transparent p-0 rounded container-border mb-5">
        <h3>Companies You Created</h3>
        @if ($createdCompanies->isEmpty())
            <p>You have not created any companies.</p>
        @else
            @foreach ($createdCompanies as $company)
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
                                        <!-- Trigger the modal with a button -->
                                        <button type="button" class="btn btn-success bg-green-gradient" data-toggle="modal"
                                            data-target="#addTeamModal" data-companyid="{{ $company->id }}">
                                            <img class="icon me-2" src="assets/images/icon-team.svg" draggable="false">Add Team
                                        </button>
                                        <a class="btn btn-secondary" href="{{ route('team.all', ['company' => $company->id]) }}" role="button">
                                            <img class="icon me-2" src="assets/images/icon-team.svg" draggable="false">All
                                        </a>
                                        <a class="btn btn-secondary" href="{{ route('task.forCompany', ['company' => $company->id]) }}" role="button">
                                            <img class="icon me-2" src="{{asset ('assets/images/icon-sidebar-tasks.svg')}}" draggable="false">All
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
                                            <a href="{{ route('team.show', ['team' => $team->id]) }}" class="btn btn-secondary"> 
                                                <img class="icon" src="{{asset ('assets/images/icon-team.svg')}}" draggable="false"> 
                                            </a>
                                            <a href="task" class="btn btn-secondary">
                                                <img class="icon" src="{{asset ('assets/images/icon-sidebar-tasks.svg')}}" draggable="false">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        @endif
    </div>

    {{-- Companies Joined by User --}}
    <div class="container bg-transparent p-0 rounded container-border">
        <h3>Companies You Joined</h3>
        @if ($joinedCompanies->isEmpty())
            <p>You have not joined any companies.</p>
        @else
            @foreach ($joinedCompanies as $company)
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
                                        <a class="btn btn-secondary" href="{{ route('team.all', ['company' => $company->id]) }}" role="button">
                                            <img class="icon me-2" src="{{asset ('assets/images/icon-team.svg')}}" draggable="false">All
                                        </a>
                                        <a class="btn btn-secondary" href="{{ route('task.forCompany', ['company' => $company->id]) }}" role="button">
                                            <img class="icon me-2" src="{{asset ('assets/images/icon-sidebar-tasks.svg')}}" draggable="false">All
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
                                            <a href="{{ route('team.show', ['team' => $team->id]) }}" class="btn btn-secondary"> 
                                                <img class="icon" src="{{asset ('assets/images/icon-team.svg')}}" draggable="false"> 
                                            </a>
                                            <a href="task" class="btn btn-secondary">
                                                <img class="icon" src="{{asset ('assets/images/icon-sidebar-tasks.svg')}}" draggable="false">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        @endif
    </div>
</div>

<!-- Modal -->
<div id="addTeamModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Team</h4>
                <a class="btn-close bounce-click" data-dismiss="modal" aria-label="Close" title="Close"></a>
            </div>
            <div class="modal-body bg-gray">
                <form action="{{ route('boss.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="company_id" id="company_id">
                    <div class="col-md-12 d-flex align-items-stretch">
                        <div class="container text-white p-3 rounded h-100">
                            <label for="name">Team name</label>
                            <input type="text" name="name"
                                class="form-control bg-black text-white border-0 mt-2" placeholder="Enter Team Name"
                                value="" required>
                        </div>
                    </div>
                    <div class="btn-group table-border th-btn center"
                        style="background-color: #303030" role="group"
                        aria-label="Button group">
                        <button type="submit" class="btn btn-secondary"
                            role="button">
                            <img class="icon"
                                src="{{asset ('assets/images/icon-submit.svg')}}" draggable="false">Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('assets/js/alert-copy.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#addTeamModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var companyId = button.data('companyid');
            var modal = $(this);
            modal.find('.modal-body #company_id').val(companyId);
        });

        // Make the modal draggable
        $('.modal .modal-dialog').draggable({
            handle: ".modal-header"
        });

        // Make the logo draggable
        $('.footer-logo').draggable({
            cursor: 'grabbing'
        });
    });
</script>

@stop
