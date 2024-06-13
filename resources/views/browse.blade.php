@extends('layouts.master-workspace')
@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/browse.css') }}">

<div class="container">
    {{-- BREADCRUMB --}}
    <div class="breadcrumb mt-4 mb-2">
        <a href="#" class="breadcrumb-link">Browse</a>
    </div>
    <h5 class="mb-4">Join a company or create your own!</h5>

    {{-- CONTAINER 1 --}}
    <div class="container bg-transparent p-0 mb-4 rounded container-border">
        <div class="row" id="tabs-container">
            <div class="col-md-6 tab-container">
                <a href="browse-create" class="text-decoration-none">
                    <div class="tab rounded" id="create-company-tab">
                        <h2>Create Company</h2>
                        <p>Create your very own company</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 tab-container">
                <a href="browse-search" class="text-decoration-none">
                    <div class="tab rounded" id="join-company-tab">
                        <h2>Join Company</h2>
                        <p>Join the workforce!</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

@stop