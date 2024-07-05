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
            <div class="table-container table-border rounded mt-3 mb-5">
                <table class="table m-0" style="table-layout: fixed; width: 100%;">
                    <thead>
                        <tr>
                            <th colspan="3" class="align-middle">
                                <img class="me-2 mb-1" src="{{asset ('assets/images/icon-exclamation-green.svg')}}" draggable="false">You have not created any companies.
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        @else
        @foreach ($createdCompanies as $company)
            <div class="table-container table-border rounded mb-5">
                <table class="table table-company-name m-0" style="table-layout: fixed; width: 100%;">
                    <thead>
                        <tr>
                            <th class="align-middle">
                                {{ $company->name }}&nbsp;&nbsp;
                                <a class="copy-code" href="javascript:void(0);" data-code="{{ $company->company_code }}" style="text-decoration: none;" title="Copy Invite Code">
                                    <code style="white-space: nowrap; font-family: 'Courier New', Courier, monospace; font-weight: 800; background-color: #202020; padding: 3px 5px; border-radius: 4px; color: #808080;"><img class="icon ms-1" style="width: 12px; filter: opacity(0.6);" src="{{asset ('assets/images/icon-copy.svg')}}">{{ $company->company_code }}
                                    </code>
                                </a>
                            </th>
                            <th colspan="2" class="align-middle text-end">
                                <div class="btn-group table-border th-btn" style="background-color: #303030" role="group"
                                    aria-label="Button group">
                                    <!-- Trigger the modal with a button -->
                                    <a type="button" class="btn btn-success bg-green-gradient" data-toggle="modal"
                                        data-target="#addTeamModal" data-companyid="{{ $company->id }}">
                                        <img class="icon me-2" src="assets/images/icon-team.svg" draggable="false">Add Team
                                    </a>
                                    <a class="btn btn-secondary" href="{{ route('team.all', ['company' => $company->id]) }}" role="button">
                                        <img class="icon me-2" src="assets/images/icon-team.svg" draggable="false">All
                                    </a>
                                    <a class="btn btn-secondary" href="{{ route('task.forCompany', ['company' => $company->id]) }}" role="button">
                                        <img class="icon me-2" src="assets/images/icon-sidebar-tasks.svg" draggable="false">All
                                    </a>
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#CompanySettingsModal{{ $company->id }}">
                                        <img class="icon mx-auto" src="assets/images/icon-gear.svg" draggable="false">
                                    </button>
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
                                        <img class="icon mx-auto" src="{{asset ('assets/images/icon-team.svg')}}" draggable="false"> 
                                    </a>
                                    <a href="{{ route('team.tasks', ['team' => $team->id]) }}" class="btn btn-secondary">
                                        <img class="icon" src="{{asset ('assets/images/icon-sidebar-tasks.svg')}}" draggable="false">
                                    </a>
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#deleteTeamModal" data-team-id="{{ $team->id }}" data-team-name="{{ $team->name }}">
                                        <img class="icon" src="{{asset ('assets/images/icon-trash.svg')}}" draggable="false">
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal | Company Settings -->
            <div id="CompanySettingsModal{{ $company->id }}" class="modal fade" role="dialog">
                <div class="modal-dialog" style="top: 10% !important; max-width: 580px;">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header p-4">
                            <h4 class="modal-title">Company Settings</h4>
                            <button type="button" class="btn-close bounce-click" data-dismiss="modal" aria-label="Close" title="Close"></button>
                        </div>
                        <div class="modal-body bg-gray p-4">
                            <form id="companySettingsForm{{ $company->id }}" method="post" enctype="multipart/form-data" action="{{ route('companies.update', ['company' => $company->id]) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="company_id" id="company_id" value="{{ $company->id }}">

                                <div class="row">
                                    <!-- LEFT SIDE -->
                                    <div class="col-md-6">
                                        <!-- Company Name -->
                                        <div class="mb-3">
                                            <label for="company_name">Company Name</label>
                                            <input type="text" id="company_name" name="name" class="form-control bg-black text-white border-0 mt-2" value="{{ $company->name }}" placeholder="Enter Company Name">
                                        </div>

                                        <!-- Company Industry -->
                                        <div class="mb-3">
                                            <label for="company_industry">Industry</label>
                                            <input type="text" id="company_industry" name="industry" class="form-control bg-black text-white border-0 mt-2" value="{{ $company->industry }}" placeholder="Enter Company Industry">
                                        </div>
                                    </div>

                                    <!-- RIGHT SIDE -->
                                    <div class="col-md-6">
                                        <!-- Company Visibility -->
                                        <div class="mb-3">
                                            <label for="company_visibility">Visibility</label>
                                            <select id="company_visibility" name="visibility" class="form-control bg-black text-white border-0 mt-2" required>
                                                <option value="public" {{ $company->visibility == 'public' ? 'selected' : '' }}>Public</option>
                                                <option value="private" {{ $company->visibility == 'private' ? 'selected' : '' }}>Private</option>
                                            </select>
                                        </div>

                                        <!-- Company Code -->
                                        <div class="mb-3">
                                            <label for="company_code">Company Code</label>
                                            <div class="d-flex align-items-center">
                                                <input type="text" name="company_code" id="company_code" class="form-control bg-black text-white border-0 mt-2 rounded-0 rounded-start" placeholder="Enter Company Code" value="{{ $company->company_code }}" readonly>
                                                <button type="button" class="btn btn-secondary generate-company-code mt-2 rounded-0 rounded-end">
                                                    <img class="icon mx-auto" src="{{ asset('assets/images/icon-random.svg') }}" draggable="false">
                                                </button>
                                            </div>                                                
                                        </div>
                                    </div>
                                </div>

                                <!-- BOTTOM -->
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="company_description">Description</label>
                                        <textarea id="company_description" name="description" class="form-control bg-black text-white border-0 mt-2" placeholder="Enter Company Description" rows="4">{{ $company->description }}</textarea>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-flex justify-content-center">
                                    <button type="submit" id="submitCompanySettings" class="btn btn-secondary">
                                        <img class="icon" src="{{ asset('assets/images/icon-submit.svg') }}" draggable="false">Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        @endif
    </div>

    {{-- Companies Joined by User --}}
    <div class="container bg-transparent p-0 rounded container-border">
        <h3>Companies You Joined</h3>
        @if ($joinedCompanies->isEmpty())
        <div class="table-container table-border rounded mt-3 mb-5">
            <table class="table m-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th colspan="3" class="align-middle">
                            <img class="me-2 mb-1" src="{{asset ('assets/images/icon-exclamation-green.svg')}}" draggable="false">You have not joined any companies.
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        @else
            @foreach ($joinedCompanies as $company)
                <div class="table-container table-border rounded mb-5">
                    <table class="table table-company-name m-0" style="table-layout: fixed; width: 100%;">
                        <thead>
                            <tr>
                                <th class="align-middle">
                                    {{ $company->name }}&nbsp;&nbsp;
                                    {{-- <a class="copy-code" href="javascript:void(0);" style="text-decoration: none;" title="Copy Invite Code">
                                        <code style="white-space: nowrap; font-family: 'Courier New', Courier, monospace; font-weight: 800; background-color: #202020; padding: 3px 5px; border-radius: 4px; color: #808080;"><img class="icon ms-1" style="width: 12px; filter: opacity(0.6);" src="{{asset ('assets/images/icon-copy.svg')}}">{{ $company->company_code }}
                                        </code>
                                    </a> --}}
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
                                            <img class="icon mx-auto" src="{{asset ('assets/images/icon-team.svg')}}" draggable="false"> 
                                        </a>
                                        <a href="{{ route('team.tasks', ['team' => $team->id]) }}" class="btn btn-secondary">
                                            <img class="icon" src="{{asset ('assets/images/icon-sidebar-tasks.svg')}}" draggable="false">
                                        </a>
                                        {{-- <a class="btn btn-danger" data-toggle="modal" data-target="#deleteTeamModal" data-team-id="{{ $team->id }}" data-team-name="{{ $team->name }}">
                                            <img class="icon" src="{{asset ('assets/images/icon-trash.svg')}}" draggable="false">
                                        </a> --}}
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

<!-- Modal | Add Team -->
<div id="addTeamModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Team</h4>
                <a class="btn-close bounce-click" data-dismiss="modal" aria-label="Close" title="Close"></a>
            </div>
            <div class="modal-body bg-gray">
                <form id="addTeamForm" action="{{ route('boss.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="company_id" id="company_id">
                    <div class="col-md-12 d-flex align-items-stretch">
                        <div class="container text-white p-3 rounded h-100">
                            <label for="name">Team name</label>
                            <input type="text" id="teamName" name="name" class="form-control bg-black text-white border-0 mt-2" placeholder="Enter Team Name" required>
                            <div id="teamNameError" class="text-danger mt-2" style="display: none;">
                                Team already exists!
                            </div>
                        </div>
                    </div>
                    <div class="btn-group table-border th-btn center" style="background-color: #303030" role="group" aria-label="Button group">
                        <button type="submit" class="btn btn-secondary" role="button">
                            <img class="icon" src="{{ asset('assets/images/icon-submit.svg') }}" draggable="false">Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal | Delete Team -->
<div id="deleteTeamModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <img class="icon ms-1 me-3" style="transform: scale(1.5);" src="{{ asset('assets/images/icon-warning.svg') }}" draggable="false">
                    Warning
                </h4>
                <a class="btn-close bounce-click" data-dismiss="modal" aria-label="Close" title="Close"></a>
            </div>
            <div class="modal-body bg-gray">
                <form id="deleteTeamForm" action="" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="team_id" id="delete_team_id">
                    <div class="col-md-12 d-flex align-items-stretch">
                        <div class="container text-white p-3 rounded h-100">
                            <label for="name">You are about to delete the team "<b id="delete_team_name"></b>" from your company. Are you sure you want to proceed?</label>
                        </div>
                    </div>
                    <div class="btn-group table-border th-btn center" style="background-color: #303030" role="group" aria-label="Button group">
                        <button type="submit" class="btn btn-secondary" role="button">
                            <img class="icon" src="{{ asset('assets/images/icon-submit.svg') }}" draggable="false">Submit
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
        $('#deleteTeamModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var teamId = button.data('team-id'); // Extract info from data-* attributes
            var teamName = button.data('team-name');

            var modal = $(this);
            modal.find('.modal-body #delete_team_name').text(teamName);
            modal.find('.modal-body #delete_team_id').val(teamId);
            modal.find('form').attr('action', '/teams/' + teamId);
        });
    });
</script>


<script>
    $(document).ready(function () {
        // Populate the Add Team Modal
        $('#addTeamModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var companyId = button.data('companyid');
            var modal = $(this);
            modal.find('.modal-body #company_id').val(companyId);
        });

        // Check input to see if team name already exists
        $('#teamName').on('input', function () {
            var teamName = $(this).val().trim();
            var companyId = $('#company_id').val();

            if (teamName.length > 0) {
                $.ajax({
                    url: '{{ route("check.team.name") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: teamName,
                        company_id: companyId
                    },
                    success: function (response) {
                        if (response.exists) {
                            $('#teamNameError').show();
                            $('#addTeamForm button[type="submit"]').prop('disabled', true);
                        } else {
                            $('#teamNameError').hide();
                            $('#addTeamForm button[type="submit"]').prop('disabled', false);
                        }
                    },
                    error: function () {
                        $('#teamNameError').text('Error checking team name. Please try again.').show();
                        $('#addTeamForm button[type="submit"]').prop('disabled', true);
                    }
                });
            } else {
                $('#teamNameError').hide();
                $('#addTeamForm button[type="submit"]').prop('disabled', false);
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
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

<script>
    // Generate a random company code with route company.generateCode
    document.querySelector('.generate-company-code').addEventListener('click', function() {
        fetch('{{ route('company.generateCode') }}')
            .then(response => response.json())
            .then(data => {
                document.getElementById('company_code').value = data.code;
            })
            .catch(error => console.error('Error:', error));
    });
</script>

@stop
