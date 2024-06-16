@extends('layouts.master-workspace')
@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    {{-- BREADCRUMB --}}
    <div class="breadcrumb mt-4 mb-4">
        <a href="/browse" class="breadcrumb-link">Browse</a>
        <i class="arrow-right"></i>
        <a href="#" class="breadcrumb-link">Create</a>
    </div>

    {{-- CONTAINER 1 --}}
    <div class="container bg-gray p-0 rounded container-border">
        <div class="table-container table-border rounded mb-5">
            <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th class="align-middle">Company Creation Form</th>
                        <th class="align-middle"></th>
                        <th class="align-middle text-center">
                        </th>
                    </tr>
                </thead>
            </table>
            <form action="{{ route('browse.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row d-flex">
                    {{-- LEFT BOX --}}
                    <div class="col-md-6 d-flex align-items-stretch">
                        <div class="container m-3 text-white p-3 rounded h-100">
                            <label for="name">Company Name</label>
                            <input type="text" name="name" class="form-control bg-black text-white border-0 mb-2"
                                placeholder="John Co.Ltd" value="" required>
                            <label for="industry">Industry</label>
                            <input type="text" name="industry" class="form-control bg-black text-white border-0 mb-2"
                                placeholder="Automobile" value="" required>
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control bg-black text-white border-0 mb-2" rows="5"
                                placeholder="What the company is all about"></textarea>
                        </div>
                    </div>

                    {{-- RIGHT BOX --}}
                    <div class="col-md-6 d-flex align-items-stretch">
                        <div class="container m-3 text-white p-3 rounded h-100">
                            <label for="visibility">Visibility</label>
                            <select name="visibility" class="form-select bg-black text-white border-0 mb-2"
                                placeholder="Visibility" required>
                                <option value="Public" selected>Public</option>
                                <option value="Private">Private</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row d-flex ps-4 pe-4">
                    <div class="col-md-12">
                        <div class="btn-group table-border th-btn center my-3" style="background-color: #303030"
                            role="group" aria-label="Button group">
                            <button type="submit" class="btn btn-secondary" role="button">
                                <img class="icon me-2 mt-1" src="assets/images/icon-submit.svg" draggable="false">Create
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{asset('assets/js/task-insert.js')}}"></script>
<script src="{{ asset('assets/js/task-insert-display.js')}}"></script>

@stop