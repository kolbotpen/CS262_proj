@extends('layouts.master-workspace')
@section('content')

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
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="container">
    <div class="breadcrumb mt-4 mb-4">
        <a href="/companies" class="breadcrumb-link">Companies</a>
        <i class="arrow-right"></i>
        <a href="#" class="breadcrumb-link">{{ $company->name }}</a>
    </div>

    @foreach ($teams as $team)
        {{-- Team Container --}}
        <div class="container bg-transparent p-0 rounded container-border">
            {{-- Team Header --}}
            <div class="table-container table-border rounded mb-5">
                <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
                    <thead>
                        <tr>
                            <th class="align-middle">{{ strtoupper($team->name) }}</th>
                            <!-- Replace 'name' with the actual field name for the team name in your database -->
                            <th class="align-middle"></th>
                            <th class="align-middle text-center">
                                <div class="btn-group table-border th-btn" style="background-color: #303030" role="group"
                                    aria-label="Button group">
                                    <a class="btn btn-success bg-green-gradient" href="#" role="button"
                                        data-bs-toggle="modal" data-bs-target="#addTeamModal{{ $team->id }}">
                                        <img class="icon me-2" src="{{ asset('assets/images/icon-user-add.svg') }}" draggable="false">
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
                                <!-- Replace 'name' with the actual field name for the user name in your database -->
                                <td class="align-middle text-center">
                                    <div class="btn-group table-border option-btn" style="background-color: #303030"
                                        role="group" aria-label="Button group">
                                        <a class="btn btn-secondary" href="mailto:{{ $user->email }}" role="button">
                                            <!-- Replace 'email' with the actual field name for the user email in your database -->
                                            <img class="icon me-2" src="{{ asset('assets/images/icon-mail.svg') }}"
                                                draggable="false">
                                        </a>
                                        <a class="btn btn-danger" href="#" role="button">
                                            <img class="icon me-2" src="{{ asset('assets/images/icon-trash.svg') }}"
                                                draggable="false">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

</div>
<!-- Modal -->
<div class="modal fade" id="addTeamModal{{ $team->id }}" tabindex="-1" role="dialog" aria-labelledby="addTeamModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Member</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('assets/js/alert-copy.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#addTeamModal{{ $team->id }}').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var companyId = button.data('companyid');
            var modal = $(this);
            modal.find('.modal-body #company_id').val(companyId);
        });


        // Make the modal draggable
        $('#addTeamModal .modal-dialog').draggable({
            handle: ".modal-header"
        });

        // Make the logo draggable
        $('.footer-logo').draggable({
            cursor: 'grabbing'
        });
    });
</script>

@stop