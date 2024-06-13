@extends('layouts.master-workspace')
@section('content')

<div class="container">
    {{-- BREADCRUMB --}}
    <div class="breadcrumb mt-4 mb-2">
        <a href="/browse" class="breadcrumb-link">Browse</a>
        <i class="arrow-right"></i>
        <a href="#" class="breadcrumb-link">Search</a>
    </div>
    <h5 class="mb-4">Note: Only public companies are visible here</h5>


    {{-- CONTAINER 1 --}}
    <div class="container bg-transparent p-0 rounded container-border">
        {{-- Loop through each company --}}
            <div class="table-container table-border rounded mb-5">
                <table class="table table-company-name m-0" style="table-layout: fixed; width: 100%;">
                    <thead>
                        <tr>
                            <th class="align-middle">Public Companies</th>                        
                            {{-- <th class="align-middle"></th> --}}
                            <th colspan="2" class="align-middle text-end">
                                <div class="btn-group table-border th-btn" style="background-color: #202020;" role="group" aria-label="Button group">
                                    <input type="text" class="form-control bg-transparent border-0 text-white" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-secondary" type="button">
                                        <img src="{{ asset('assets/images/icon-search.svg') }}" class="icon" draggable="false">
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
                    <tbody>
                            <tr>
                                <td class="align-middle">IKEA</td>
                                <td class="align-middle">Furnitures</td>
                                <td class="align-middle text-center">
                                    <div class="btn-group table-border option-btn" role="group" aria-label="Button group">
                                        <a href="company-details" class="btn btn-secondary">
                                            <img class="icon" src="assets/images/icon-view.svg" draggable="false">
                                        </a>
                                        <a href="company-request-join" class="btn btn-secondary">
                                            <img class="icon" src="assets/images/icon-submit.svg" draggable="false">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
    </div>
</div>

@stop
