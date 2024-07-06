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
                <img class="me-2" src="{{ asset('assets/images/icon-checkmark-green.svg') }}">{{ session('success') }}
            </div>
        @endif
        @if ($requests->isEmpty())
        <div class="table-container table-border rounded mt-3 mb-5">
            <table class="table m-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th colspan="3" class="align-middle">
                            <img class="me-2 mb-1" src="{{asset ('assets/images/icon-exclamation-green.svg')}}" draggable="false">No incoming requests.
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
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

    {{-- Members from Companies Created by Current User --}}
    <div class="container bg-transparent p-0 rounded container-border mb-5">
        <h3>Members in your Companies <span class="count">{{ $userCount }}</span></h3>
        @if ($users->isEmpty())
            <p>No users found</p>
        @else
            <div class="table-container table-border rounded mb-5">
                <table class="table table-company-name m-0" style="table-layout: fixed; width: 100%;">
                    <thead>
                        <tr>
                            <th colspan="3" class="align-middle text-end">
                                <div class="btn-group table-border th-btn" style="background-color: #202020;" role="group"
                                    aria-label="Button group">
                                    <input type="text" class="form-control bg-transparent border-0 text-white"
                                        placeholder="Search username" aria-label="Search" id="searchInput">
                                    <button class="btn btn-secondary" type="button" id="searchButton">
                                        <img src="{{ asset('assets/images/icon-search.svg') }}" class="icon"
                                            draggable="false">
                                    </button>
                                    <button class="btn btn-secondary" type="button" id="sortButton" title="Sort Company by Name">
                                        <img id="sortIcon" src="{{ asset('assets/images/icon-sort-za.svg') }}" class="icon"
                                            draggable="false"> Sort by Company
                                    </button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>
                <table class="table table-requests m-0" style="table-layout: fixed; width: 100%;">
                    <thead>
                        <tr>
                            <th class="align-middle">Name</th>
                            <th class="align-middle">Email</th>
                            <th class="align-middle">Company</th>
                            <th class="align-middle text-center">Options</th>
                        </tr>
                    </thead>
                    <tbody id="companyTableBody">
                        @foreach ($users as $user)
                            @foreach ($user->companies as $company)
                                @if (in_array($company->id, $bossCompanies))
                                    <tr>
                                        <td class="align-middle">{{ $user->name }}</td>
                                        <td class="align-middle">{{ $user->email }}</td>
                                        <td class="align-middle">{{ $company->name }}</td>
                                        <td class="align-middle text-center">
                                            <div class="btn-group table-border option-btn" style="background-color: #303030" role="group" aria-label="Button group">
                                                <a class="btn btn-secondary" href="mailto:{{ $user->email }}" role="button">
                                                    <img class="icon mx-auto" src="{{ asset('assets/images/icon-mail.svg') }}" draggable="false">
                                                </a>
                                                {{-- <a class="btn btn-danger" href="#" role="button">
                                                    <img class="icon mx-auto" src="{{ asset('assets/images/nav-logout.svg') }}" draggable="false">
                                                </a> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
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
<script>
    $(document).ready(function() {
        // live search functionality
        $('#searchInput').on('input', function() {
            var searchText = $(this).val().toLowerCase();

            $('#companyTableBody tr').each(function() {
                var userName = $(this).find('td:first').text().toLowerCase();
                if(userName.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        // Sort toggle state
        var sortAsc = true;

        // Sort functionality
        $('#sortButton').on('click', function() {
            var rows = $('#companyTableBody tr').get();

            rows.sort(function(a, b) {
                var A = $(a).find('td').eq(2).text().toUpperCase(); // Company name
                var B = $(b).find('td').eq(2).text().toUpperCase();

                if(A < B) {
                    return sortAsc ? -1 : 1;
                }
                if(A > B) {
                    return sortAsc ? 1 : -1;
                }
                return 0;
            });

            $.each(rows, function(index, row) {
                $('#companyTableBody').append(row);
            });

            // Toggle the sorting order and icon for the next click
            sortAsc = !sortAsc;
            $('#sortIcon').attr('src', sortAsc ? '{{ asset('assets/images/icon-sort-za.svg') }}' : '{{ asset('assets/images/icon-sort-az.svg') }}');
        });
    });
</script>
@stop
