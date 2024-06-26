@extends('layouts.master-workspace')
@section('content')

<div class="container">
    <div class="breadcrumb mt-4 mb-4">
        <a href="/companies" class="breadcrumb-link">Companies</a>
        <i class="arrow-right"></i>
        <a href="#" class="breadcrumb-link">{{ $team->name }}</a>
    </div>

    {{-- CONTAINER 1 --}}
    <div class="container bg-transparent p-0 rounded container-border">
        <div class="table-container table-border rounded mb-5">
            <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th class="align-middle">{{ $team->name }}</th>
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
                    @foreach($team->users as $index => $member)
                        <tr>
                            <td class="align-middle">{{ $index + 1 }}.</td>
                            <td class="align-middle">{{ $member->name }}</td>
                            <td class="align-middle text-center">
                                <div class="btn-group table-border option-btn" style="background-color: #303030"
                                    role="group" aria-label="Button group">
                                    <a class="btn btn-secondary" href="mailto:{{ $member->email }}" role="button">
                                        <img class="icon mx-auto" src="{{ asset('assets/images/icon-mail.svg') }}"
                                            draggable="false">
                                    </a>
                                    <a class="btn btn-danger" href="#" role="button">
                                        <img class="icon mx-auto" src="{{ asset('assets/images/icon-trash.svg') }}"
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
@stop