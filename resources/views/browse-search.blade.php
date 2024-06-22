@extends('layouts.master-workspace')

@section('content')

<div class="container">

    {{-- BREADCRUMB --}}
    <div class="breadcrumb mt-4 mb-2">
        <a href="/browse" class="breadcrumb-link">Browse</a>
        <i class="arrow-right"></i>
        <a href="#" class="breadcrumb-link">Search</a>
    </div>
    <h5 class="mb-4">Join a company via invite code</h5>

    @if (session('success'))
    <div class="alert alert-success mt-3">
        <img class="me-2" src="{{asset ('assets/images/icon-checkmark-green.svg')}}">{{ session('success') }}
    </div>
    @endif

    @if (session('message'))
    <div class="alert alert-success mt-3">
        <img class="me-2" src="{{asset ('assets/images/icon-exclamation-green.svg')}}">{{ session('message') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <img class="me-2" src="{{asset ('assets/images/icon-cross-red.svg')}}">
        @foreach ($errors->all() as $error)
        {{ $error }}
        @endforeach
    </div>
    @endif

    {{-- CONTAINER 1 --}}
    <div class="container bg-transparent p-0 rounded container-border">
        {{-- Loop through each company --}}
        <div class="table-container table-border rounded mb-4">
            <table class="table m-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th class="align-middle">Invite Code</th>
                        <th colspan="2" class="align-middle text-end">
                            <div class="btn-group table-border th-btn"
                                style="background-color: #202020; display: flex; align-items: center;" role="group"
                                aria-label="Button group">
                                <form method="POST" action="{{ route('company.join') }}"
                                    style="display: flex; align-items: center; width: 100%;">
                                    @csrf
                                    <input type="text" class="form-control bg-transparent border-0 text-white"
                                        id="company_code" name="company_code" placeholder="Code" required
                                        style="flex: 1;">
                                    <button class="btn btn-secondary" type="submit" style="flex: none;">
                                        <img src="{{ asset('assets/images/icon-checkmark.svg') }}" class="icon"
                                            draggable="false">
                                    </button>
                                </form>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <h5 class="mb-4">Note: Only public companies are visible here</h5>
    {{-- CONTAINER 2 --}}
    <div class="container bg-transparent p-0 rounded container-border">
        {{-- Loop through each company --}}
        <div class="table-container table-border rounded mb-5">
            <table class="table table-company-name m-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th class="align-middle">Public Companies</th>
                        <th colspan="2" class="align-middle text-end">
                            <div class="btn-group table-border th-btn" style="background-color: #202020;" role="group"
                                aria-label="Button group">
                                <input type="text" class="form-control bg-transparent border-0 text-white"
                                    placeholder="Search" aria-label="Search" id="searchInput">
                                <button class="btn btn-secondary" type="button" id="searchButton">
                                    <img src="{{ asset('assets/images/icon-search.svg') }}" class="icon"
                                        draggable="false">
                                </button>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>

            <table class="table m-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th class="align-middle">Company</th>
                        <th class="align-middle">Industry</th>
                        <th class="align-middle text-center">Options</th>
                    </tr>
                </thead>
                <tbody id="companyTableBody">
                    @foreach ($companies as $company)
                    <tr>
                        <td class="align-middle">{{ $company->name }}</td>
                        <td class="align-middle">{{ $company->industry }}</td>
                        <td class="align-middle text-center">
                            <div class="btn-group table-border option-btn" role="group" aria-label="Button group">
                                <a href="company-details/{{ $company->id }}" class="btn btn-secondary">
                                    <img class="icon" src="{{ asset('assets/images/icon-view.svg') }}"
                                        draggable="false">
                                </a>
                                <a href="company-request-join/{{ $company->id }}" class="btn btn-secondary">
                                    <img class="icon" src="{{ asset('assets/images/icon-submit.svg') }}"
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // live search functionality
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            var searchText = $(this).val().toLowerCase();

            $('#companyTableBody tr').each(function() {
                var companyText = $(this).find('td:first').text().toLowerCase();
                if(companyText.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>


@stop