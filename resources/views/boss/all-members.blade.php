@extends('layouts.master-workspace')
@section('content')

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="container">
    {{-- BREADCRUMB --}}
    <div class="breadcrumb mt-4 mb-4">
        <a href="#" class="breadcrumb-link">All Members</a>
    </div>

    {{-- Incoming Requests --}}
    <div class="container bg-transparent p-0 rounded container-border mb-5">
        <h3>Incoming Requests <span class="count">{{ $requestCount }}</span></h3>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($requests->isEmpty())
            <p>No incoming requests</p>
        @else
            <div class="table-container table-border rounded mb-5">
                <table class="table table-requests m-0" style="table-layout: fixed; width: 100%;">
                    <thead>
                        <tr>
                            <th class="align-middle">Name</th>
                            <th class="align-middle">Email</th>
                            <th class="align-middle">Description</th>
                            <th class="align-middle text-center">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $request)
                            <tr>
                                <td class="align-middle">{{ $request->user->name }}</td>
                                <td class="align-middle">{{ $request->user->email }}</td>
                                <td class="align-middle">{{ $request->description }}</td>
                                <td class="align-middle text-center">
                                    <div class="btn-group table-border option-btn" role="group" aria-label="Button group">
                                        <form action="{{ route('requests.approve', ['request' => $request->id]) }}"
                                            method="post" style="display:inline-block;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success rounded-0">
                                                <img class="icon mx-auto" src="{{ asset('assets/images/icon-checkmark.svg') }}" draggable="false">
                                            </button>
                                        </form>
                                        <form action="{{ route('requests.reject', ['request' => $request->id]) }}" method="post"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger rounded-0">
                                                <img class="icon mx-auto" src="{{ asset('assets/images/icon-cross.svg') }}" draggable="false">
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>


    {{-- Current Members --}}
    <div class="container bg-transparent p-0 rounded container-border mb-5">
        <h3>Current Members <span class="count">{{ $userCount }}</span></h3>
        @if ($users->isEmpty())
            <p>No users found</p>
        @else
            <div class="table-container table-border rounded mb-5">
                <table class="table table-requests m-0" style="table-layout: fixed; width: 100%;">
                    <thead>
                        <tr>
                            <th class="align-middle">Name</th>
                            <th class="align-middle">Email</th>
                            <th class="align-middle">Company</th>
                            <th class="align-middle text-center">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="align-middle">{{ $user->name }}</td>
                                <td class="align-middle">{{ $user->email }}</td>
                                <td class="align-middle">{{ $user->company->name ?? 'N/A' }}</td>
                                <td class="align-middle text-center">
                                    <div class="btn-group table-border option-btn" style="background-color: #303030"
                                        role="group" aria-label="Button group">
                                        <a class="btn btn-secondary" href="mailto:jane.smith@example.com" role="button">
                                            <img class="icon mx-auto" src="{{ asset('assets/images/icon-mail.svg') }}"
                                                draggable="false">
                                        </a>
                                        <a class="btn btn-danger" href="#" role="button">
                                            <img class="icon mx-auto" src="{{ asset('assets/images/nav-logout.svg') }}"
                                                draggable="false">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>





</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@stop