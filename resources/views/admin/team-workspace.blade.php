@extends('adminlayout.master')
@section('content')

<div class="container-fluid my-2">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Team</h1>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addTeamModal">Add Team</button>
            <!-- Button to trigger add user modal -->
            <button class="btn btn-success ml-2" data-toggle="modal" data-target="#addUserModal">Add User</button>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Team Table</h3>
                <div class="card-tools">
                    <div class="input-group input-group" style="width: 250px;">
                        <input type="text" id="table_search" name="table_search" class="form-control float-right"
                            placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary" id="searchButton">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <!-- <div class="input-group input-group" style="width: 250px; margin-top: 10px;">
                        <select class="form-control float-right" id="company_filter">
                            <option value="">Filter by Company</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div> -->
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th style="width: 5%;" class="text-center">#</th>
                            <th style="width: 35%;" class="text-left">Team</th>
                            <th style="width: 40%;" class="text-center">Company</th>
                            <th style="width: 20%;" class="text-right">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teams as $index => $team)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-left">{{ $team->name }}</td>
                                <td class="text-center">{{ $team->company ? $team->company->name : 'No Company' }}</td>
                                <td class="text-right">
                                    <button class="btn btn-link" onclick="editTeam({{ $team }})">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                    <form action="{{ route('team.destroy', $team->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger p-0"
                                            onclick="return confirm('Are you sure you want to delete this team?');">
                                            <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- <div class="card-footer clearfix">
                <ul class="pagination pagination m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div> -->
        </div>
    </div>
    <!-- /.card -->

    <!-- Edit Team Modal -->
    <div class="modal fade" id="editTeamModal" tabindex="-1" role="dialog" aria-labelledby="editTeamModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTeamModalLabel">Edit Team</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editTeamForm" method="POST" action="{{ route('team.update', ['team' => 0]) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="team_id" id="team_id">
                        <div class="form-group">
                            <label for="team_name" class="col-form-label">Team Name:</label>
                            <input type="text" class="form-control" id="team_name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="company_id" class="col-form-label">Company:</label>
                            <select class="form-control" id="company_id" name="company_id">
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="users" class="col-form-label">Users:</label>
                            <ul id="team_users" class="list-group">
                                <!-- Users will be dynamically populated here -->
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Team Modal -->
    <div class="modal fade" id="addTeamModal" tabindex="-1" role="dialog" aria-labelledby="addTeamModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTeamModalLabel">Add Team</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addTeamForm" method="POST" action="{{ route('team.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="new_team_name" class="col-form-label">Team Name:</label>
                            <input type="text" class="form-control" id="new_team_name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="new_company_id" class="col-form-label">Company:</label>
                            <select class="form-control" id="new_company_id" name="company_id">
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Team</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add User to Team</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addUserForm" method="POST" action="{{ route('teams.addMember', ['team' => $teamId]) }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="team_id" class="col-form-label">Select Team:</label>
                            <!-- Changed from company_id to team_id -->
                            <select class="form-control" id="team_id" name="team_id"> <!-- Adjusted name and id -->
                                @foreach ($teams as $team) <!-- Assuming $teams is passed to the view -->
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user_id" class="col-form-label">Select User:</label>
                            <select class="form-control" id="user_id" name="user_id" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

<script>
    function editTeam(team) {
        $('#editTeamModal').modal('show');
        $('#editTeamForm').attr('action', '/teams/' + team.id);
        $('#team_id').val(team.id);
        $('#team_name').val(team.name);
        $('#company_id').val(team.company_id);

        // Clear and populate the users list
        $('#team_users').empty();
        // User area
        team.users.forEach(user => {
            const listItem = `
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    ${user.name}
                    <button class="btn btn-danger btn-sm" onclick="removeUserFromTeam(${team.id}, ${user.id})">Remove</button>
                </li>
            `;
            $('#team_users').append(listItem);
        });
    }
    function removeUserFromTeam(teamId, userId) {
        if (confirm('Are you sure you want to remove this user from the team?')) {
            $.ajax({
                url: '/teams/' + teamId + '/users/' + userId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    // Refresh the modal or the page to reflect the changes
                    location.reload();
                },
                error: function (error) {
                    console.error(error);
                }
            });
        }
    }

</script>
<script>
    document.getElementById('company_filter').addEventListener('change', function () {
        var companyId = this.value || '';
        var selectedCompany = this.options[this.selectedIndex].text; // Get selected company name
        this.options[0].text = selectedCompany; // Update the default option text

        window.location.href = '{{ url("/workspace/teams") }}?company_id=' + companyId;
    });
</script>
<script>
    document.getElementById('table_search').addEventListener('keyup', function () {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById('table_search');
        filter = input.value.toUpperCase();
        table = document.querySelector('.table');
        tr = table.getElementsByTagName('tr');

        for (i = 1; i < tr.length; i++) { // Start from 1 to skip the header row
            tr[i].style.display = 'none';
            td = tr[i].getElementsByTagName('td');
            for (var j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = '';
                        break; // Stop the loop once a match is found
                    }
                }
            }
        }
    });
</script>

@stop