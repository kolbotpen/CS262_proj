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
                                        <button type="button" class="btn btn-success bg-green-gradient" data-toggle="modal"
                                            data-target="#addTeamModal" data-companyid="{{ $company->id }}">
                                            <img class="icon me-2" src="assets/images/icon-team.svg" draggable="false">Add Team
                                        </button>
                                        <a class="btn btn-secondary" href="{{ route('team.all', ['company' => $company->id]) }}" role="button">
                                            <img class="icon me-2" src="assets/images/icon-team.svg" draggable="false">All
                                        </a>
                                        <a class="btn btn-secondary" href="{{ route('task.forCompany', ['company' => $company->id]) }}" role="button">
                                            <img class="icon me-2" src="assets/images/icon-sidebar-tasks.svg" draggable="false">All
                                        </a>
                                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                            data-target="#CompanySettingsModal" data-companyid="{{ $company->id }}">
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
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Modal | Company Settings -->
                <div id="CompanySettingsModal" class="modal fade" role="dialog">
                    <div class="modal-dialog" style="top: 10% !important;">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Company Settings</h4>
                                <button type="button" class="btn-close bounce-click" data-dismiss="modal" aria-label="Close" title="Close"></button>
                            </div>
                            <div class="modal-body bg-gray">
                                <form id="companySettingsForm" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="company_id" id="company_id">

                                    <!-- Company Name -->
                                    <div class="col-md-12 mb-3">
                                        <label for="company_name">Company Name</label>
                                        <input type="text" id="company_name" name="name" class="form-control bg-black text-white border-0 mt-2" placeholder="Enter Company Name" value="{{ $company->name ?? '' }}">
                                    </div>

                                    <!-- Company Industry -->
                                    <div class="col-md-12 mb-3">
                                        <label for="company_industry">Industry</label>
                                        <input type="text" id="company_industry" name="industry" class="form-control bg-black text-white border-0 mt-2" placeholder="Enter Company Industry" value="{{ $company->industry ?? '' }}">
                                    </div>

                                    <!-- Company Description -->
                                    <div class="col-md-12 mb-3">
                                        <label for="company_description">Description</label>
                                        <textarea id="company_description" name="description" class="form-control bg-black text-white border-0 mt-2" placeholder="Enter Company Description" rows="4">{{ $company->description ?? '' }}</textarea>
                                    </div>

                                    <!-- Company Visibility -->
                                    <div class="col-md-12 mb-3">
                                        <label for="company_visibility">Visibility</label>
                                        <select id="company_visibility" name="visibility" class="form-control bg-black text-white border-0 mt-2" required>
                                            <option value="public" {{ isset($company) && $company->visibility == 'public' ? 'selected' : '' }}>Public</option>
                                            <option value="private" {{ isset($company) && $company->visibility == 'private' ? 'selected' : '' }}>Private</option>
                                        </select>
                                    </div>

                                    <!-- Company Code -->
                                    <div class="col-md-12 mb-3">
                                        <label for="company_code">Company Code</label>
                                        <div class="boss-user-input d-flex align-items-center mb-2">
                                            <input type="text" name="company_code" id="company_code" class="form-control bg-black text-white border-0" placeholder="Enter Company Code" value="{{ $company->company_code ?? '' }}" readonly>
                                            <button type="button" class="btn btn-secondary ml-2 generate-company-code"><img class="icon mx-auto" src="{{ asset('assets/images/icon-random.svg') }}" draggable="false"></button>
                                        </div>
                                    </div>

                                    <!-- Manage Boss Users -->
                                    <div class="col-md-12 mb-4">
                                        <label for="boss_users">Boss Users</label>
                                        <div class="mb-3 d-flex align-items-end">
                                            <div class="flex-grow-1">
                                                <select id="new_boss_user" class="form-control bg-black text-white border-0">
                                                    <option value="">Select a user to add as Boss</option>
                                                    @foreach($company->users as $user)
                                                        @if(!is_array($company->boss_users) || !in_array($user->id, $company->boss_users))
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-secondary mt-2 ml-2" id="addBossUserButton"><img class="icon mx-auto" src="{{ asset('assets/images/icon-add.svg') }}" draggable="false"></button>
                                            </div>
                                        </div>
                                        <div id="bossUsersContainer">
                                            <!-- Existing Boss Users will be displayed here -->
                                            @if (isset($company->boss_users) && is_array($company->boss_users))
                                                @foreach ($company->boss_users as $boss_user_id)
                                                    @php
                                                        $boss_user = App\User::find($boss_user_id);
                                                    @endphp
                                                    @if ($boss_user)
                                                        <div class="boss-user-input d-flex align-items-center mb-2">
                                                            <input type="text" name="boss_users[]" class="form-control bg-black text-white border-0" value="{{ $boss_user->name }}" readonly>
                                                            <button type="submit" class="btn btn-danger ml-2 remove-boss-user-button"><img class="icon mx-auto" src="{{ asset('assets/images/icon-trash.svg') }}" draggable="false"></button>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="btn-group table-border th-btn center mb-2" style="background-color: #303030" role="group" aria-label="Button group">
                                        <button type="submit" id="submitCompanySettings" class="btn btn-secondary" role="button">
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
            <p>You have not joined any companies.</p>
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
                                                <img class="icon" src="{{asset ('assets/images/icon-team.svg')}}" draggable="false"> 
                                            </a>
                                            <a href="{{ route('team.tasks', ['team' => $team->id]) }}" class="btn btn-secondary">
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
                            <input type="text" id="teamName" name="name" class="form-control bg-black text-white border-0 mt-2" placeholder="Enter Team Name" value="" required>
                            <div id="teamNameError" class="text-danger mt-2" style="display: none;">
                                Team name already exists.
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
                    }
                });
            } else {
                $('#teamNameError').hide();
                $('#addTeamForm button[type="submit"]').prop('disabled', false);
            }
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

<script>
    $(document).ready(function () {
        $('#CompanySettingsModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var companyId = button.data('companyid');
            var modal = $(this);
            modal.find('.modal-body #company_id').val(companyId);

            // Set the form action to the correct route
            var formAction = '{{ route("companies.update", ":companyId") }}';
            formAction = formAction.replace(':companyId', companyId);
            $('#companySettingsForm').attr('action', formAction);

            // Load company details via AJAX or populate fields directly if available
            loadCompanyDetails(companyId);
        });

        $('#addBossUserButton').click(function () {
            var newBossUserId = $('#new_boss_user').val();
            if (newBossUserId) {
                var newBossUserName = $('#new_boss_user option:selected').text();
                $('#bossUsersContainer').append('<div class="boss-user-input d-flex align-items-center mb-2"><input type="text" name="boss_users[]" class="form-control bg-black text-white border-0" value="' + newBossUserName + '" readonly><button type="button" class="btn btn-danger ml-2 remove-boss-user-button"><img class="icon mx-auto" src="{{ asset('assets/images/icon-trash.svg') }}" draggable="false"></button></div>');
                $('#new_boss_user').val(''); // Clear the select field
                $('#new_boss_user option[value="' + newBossUserId + '"]').remove(); // remove the added user from the select options
            }
        });

        $(document).on('click', '.remove-boss-user-button', function () {
            var userId = $(this).closest('.boss-user-input').find('input').val();
            $(this).closest('.boss-user-input').remove();
            $('#new_boss_user').append('<option value="' + userId + '">' + userId + '</option>'); // Add the removed user back to the select options
        });

        // Load company details (this function should be implemented to fetch data from the server)
        function loadCompanyDetails(companyId) {
            // Example AJAX call to get company details
            $.ajax({
                url: '/companies/details/' + companyId,
                type: 'GET',
                success: function (response) {
                    $('#company_name').val(response.name);
                    $('#company_industry').val(response.industry);
                    $('#company_description').val(response.description);
                    $('#company_visibility').val(response.visibility); // Set the visibility

                    // Populate boss users
                    $('#bossUsersContainer').empty();
                    if (response.boss_users && Array.isArray(response.boss_users)) {
                        response.boss_users.forEach(function (userId) {
                            var bossUser = response.users.find(function (user) {
                                return user.id === userId;
                            });
                            if (bossUser) {
                                $('#bossUsersContainer').append('<div class="boss-user-input d-flex align-items-center mb-2"><input type="text" name="boss_users[]" class="form-control bg-black text-white border-0" value="' + bossUser.name + '" readonly><button type="button" class="btn btn-danger ml-2 remove-boss-user-button"><img class="icon mx-auto" src="{{ asset('assets/images/icon-trash.svg') }}" draggable="false"></button></div>');
                            }
                        });
                    }

                    // Populate the select options for new boss users
                    $('#new_boss_user').empty();
                    $('#new_boss_user').append('<option value="">Select a user to add as Boss</option>');
                    response.users.forEach(function (user) {
                        if (!response.boss_users || !response.boss_users.includes(user.id)) {
                            $('#new_boss_user').append('<option value="' + user.id + '">' + user.name + '</option>');
                        }
                    });
                }
            });
        }
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
