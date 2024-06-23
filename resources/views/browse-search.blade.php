@extends('layouts.master-workspace')
@section('content')

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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
                                {{-- <a href="company-details/{{ $company->id }}" class="btn btn-secondary">
                                    <img class="icon" src="{{ asset('assets/images/icon-view.svg') }}"
                                        draggable="false">
                                </a> --}}
                                <a type="button" class="btn btn-secondary" data-toggle="modal" data-target="#companyDetailsModal"
                                    data-companyname="{{ $company->name }}" data-companyindustry="{{ $company->industry }}"
                                    data-companydescription="{{ $company->description }}">
                                    <img class="icon mx-auto" src="{{ asset('assets/images/icon-view.svg') }}" draggable="false">
                                </a>
                                <a href="company-request-join/{{ $company->id }}" class="btn btn-secondary">
                                    <img class="icon" src="{{ asset('assets/images/icon-submit.svg') }}" draggable="false">
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

<!-- Company Details Modal -->
<div id="companyDetailsModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="top: 7% !important;">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Company Details</h4>
                <a class="btn-close bounce-click" data-dismiss="modal" aria-label="Close" title="Close"></a>
            </div>
            <div class="modal-body bg-gray">
                <div class="col-md-12 d-flex align-items-stretch">
                    <div class="container text-white p-3 rounded h-100">
                        {{-- Company Image --}}
                        <div class="modal-image-container mb-4 rounded">
                            <img class="modal-image company_image" src="{{asset ('assets/images/photo2.png')}}">
                        </div>

                        <label for="company_name">Company Name</label>
                        <p id="company_name" class="text-gray mt-2"></p>
                        
                        <label for="company_industry">Industry</label>
                        <p id="company_industry" class="text-gray mt-2"></p>
                        
                        <label for="company_description">Description</label>
                        <p id="company_description" class="text-gray mt-2"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function () {
        $('#companyDetailsModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var companyName = button.data('companyname');
            var companyIndustry = button.data('companyindustry');
            var companyDescription = button.data('companydescription');

            var modal = $(this);
            modal.find('#company_name').text(companyName);
            modal.find('#company_industry').text(companyIndustry);
            modal.find('#company_description').text(companyDescription);
        });

        // Initialize the draggable functionality
        $('#companyDetailsModal .modal-dialog').draggable({
            handle: ".modal-header"
        });
    });
</script>

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
