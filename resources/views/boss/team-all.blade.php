@extends('layouts.master-workspace')
@section('content')

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="container">

    <div class="breadcrumb mt-4 mb-4">
        <a href="/companies" class="breadcrumb-link">Companies</a>
        <i class="arrow-right"></i>
        <a href="#" class="breadcrumb-link">{{ $company->name }}</a>
    </div>

    @if (session('success'))
    <div class="alert alert-success">
        <img class="me-2" src="{{ asset('assets/images/icon-checkmark-green.svg') }}">{{ session('success') }}
    </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            <img class="me-2" src="{{ asset('assets/images/icon-cross-red.svg') }}">{{ session('error') }}
        </div>
    @endif

    @if($teams->isEmpty())
    <div class="table-container table-border rounded mt-3 mb-5">
        <table class="table m-0" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th colspan="3" class="align-middle">
                        <img class="me-2 mb-1" src="{{asset ('assets/images/icon-exclamation-green.svg')}}" draggable="false">There are currently no teams available. Please add a team.
                    </th>
                </tr>
            </thead>
        </table>
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
                                        {{-- Add Member Button Conditional Display --}}
                                        @if($company->users->find(auth()->id())->pivot->is_boss)
                                            <a class="btn btn-success bg-green-gradient" href="#" role="button"
                                                data-bs-toggle="modal" data-bs-target="#addTeamModal{{ $team->id }}">
                                                <img class="icon me-2" src="{{ asset('assets/images/icon-user-add.svg') }}"
                                                    draggable="false">
                                                Add Member
                                            </a>
                                        @endif
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
                                <th class="align-middle">Email</th>
                                <th class="align-middle text-center w-16">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Inside the loop for displaying team members --}}
                            @forelse ($team->users as $index => $user)
                                <tr>
                                    <td class="align-middle">{{ $index + 1 }}</td>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <div class="mini-profile-picture rounded-circle me-3">
                                                <img class="img-fluid" src="{{ $user->profile_picture }}" alt="{{ $user->name }}">
                                            </div>
                                            {{ $user->name }}
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <a style="text-decoration: none; color: white;" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="btn-group table-border option-btn" style="background-color: #303030" role="group" aria-label="Button group">
                                            <a class="btn btn-secondary" href="mailto:{{ $user->email }}" role="button">
                                                <img class="icon mx-auto" src="{{ asset('assets/images/icon-mail.svg') }}" draggable="false">
                                            </a>
                                            {{-- Delete Member Form Conditional Display --}}
                                            @if($company->users->find(auth()->id())->pivot->is_boss)
                                                <form action="{{ route('team.remove.member', ['team_id' => $team->id, 'user_id' => $user->id]) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Are you sure you want to remove this user from the team?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger rounded-0" role="button">
                                                        <img class="icon mx-auto" src="{{ asset('assets/images/icon-trash.svg') }}" draggable="false">
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No members found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="addTeamModal{{ $team->id }}" tabindex="-1" role="dialog" aria-labelledby="addTeamModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Member</h4>
                            <button type="button" class="btn-close bounce-click" data-bs-dismiss="modal" aria-label="Close"
                                    title="Close"></button>
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
        $('#addTeamModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var teamId = button.data('team-id'); // Extract info from data-* attributes

            // Use the teamId in your JavaScript code as needed
            // For example, setting it as a form input value:
            $(this).find('.modal-body input[name="team_id"]').val(teamId);
        });

        // Make the modal draggable using Bootstrap's built-in draggable functionality
        $('.modal .modal-dialog').draggable({
            handle: ".modal-header"
        });
    });
</script>
@stop
