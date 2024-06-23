@extends('layouts.master-workspace')
@section('content')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="container">
    <div class="breadcrumb mt-4 mb-4">
        <a href="/companies" class="breadcrumb-link">Companies</a>
        <i class="arrow-right"></i>
        <a href="#" class="breadcrumb-link">{{ $company->name }}</a>
    </div>
    @if($teams->isEmpty())
        <div class="alert alert-info" role="alert">
            There are currently no teams available. Please add a team.
        </div>
    @else
        @foreach ($teams as $team)
            {{-- Team Container --}}
            <div class="container bg-transparent p-0 rounded container-border">
                {{-- Team Header --}}
                <div class="table-container table-border rounded mb-5">
                    <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
                        <thead>
                            <tr>
                                <th class="align-middle">{{ strtoupper($team->name) }}</th>
                                <th class="align-middle"></th>
                                <th class="align-middle text-center">
                                    <div class="btn-group table-border th-btn" style="background-color: #303030" role="group"
                                        aria-label="Button group">
                                        <a class="btn btn-success bg-green-gradient" href="#" role="button"
                                            data-bs-toggle="modal" data-bs-target="#addTeamModal{{ $team->id }}">
                                            <img class="icon me-2" src="{{ asset('assets/images/icon-user-add.svg') }}"
                                                draggable="false">
                                            Add Member
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
                                    <td class="align-middle">{{ $user->name }}</td>
                                    <td class="align-middle text-center">
                                        <div class="btn-group table-border option-btn" style="background-color: #303030"
                                            role="group" aria-label="Button group">
                                            <a class="btn btn-secondary" href="mailto:{{ $user->email }}" role="button">
                                                <img class="icon mx-auto" src="{{ asset('assets/images/icon-mail.svg') }}"
                                                    draggable="false">
                                            </a>
                                            <form
                                                action="{{ route('team.remove.member', ['team_id' => $team->id, 'user_id' => $user->id]) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to remove this user from the team?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" role="button">
                                                    <img class="icon mx-auto" src="{{ asset('assets/images/icon-trash.svg') }}"
                                                        draggable="false">
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="addTeamModal{{ $team->id }}" tabindex="-1" role="dialog"
                aria-labelledby="addTeamModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Member</h4>
                            <a type="button" class="btn-close bounce-click" data-bs-dismiss="modal" aria-label="Close"
                                title="Close"></a>
                        </div>
                        <div class="modal-body bg-gray">
                            <form action="{{ route('team.add.member') }}" method="post">
                                @csrf
                                <input type="hidden" name="team_id" value="{{ $team->id }}">
                                <div class="col-md-12 d-flex align-items-stretch">
                                    <div class="container text-white p-3 rounded h-100">
                                        <label for="user_id">Select User</label>
                                        <select name="user_id" class="form-control bg-black text-white border-0 mt-2" required>
                                            @foreach($company->users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="btn-group table-border th-btn center" style="background-color: #303030" role="group"
                                    aria-label="Button group">
                                    <button type="submit" class="btn btn-secondary">
                                        <img class="icon" src="{{ asset('assets/images/icon-submit.svg') }}"
                                            draggable="false">Submit
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('assets/js/alert-copy.js') }}"></script>
<script>
$(document).ready(function () {
    // Use a generic selector for the modal
    $('#addTeamModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var teamId = button.data('team-id'); // Extract info from data-* attributes
        
        // Use the teamId in your JavaScript code as needed
        // For example, setting it as a form input value:
        $(this).find('.modal-body input[name="team_id"]').val(teamId);
    });
});
</script>
@stop