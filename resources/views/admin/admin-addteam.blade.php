<!-- resources/views/admin/admin-addteam.blade.php -->

@extends('adminlayout.master')
@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row d-flex">
        {{-- LEFT BOX --}}
        <div class="col-md-6 d-flex align-items-stretch">
            <div class="container m-3 p-3 rounded h-100">
                <label for="name">Team Name</label>
                <input type="text" name="name" class="form-control border-0" placeholder="Team Name" value="" required>
            </div>
        </div>
        {{-- RIGHT BOX --}}
        <div class="col-md-6 d-flex align-items-stretch">
            <div class="container m-3 p-3 rounded h-100">
                <label for="company_id">Select Company</label>
                <select name="company_id" class="form-control border-0" required>
                    <option value="">Select Company</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="m-3 d-flex justify-content-center">
        <button type="submit" class="btn btn-primary d-inline-flex rounded align-items-center justify-content-center" style="height: 40px;">
            <img class="icon me-2 mt-1" src="assets/images/icon-submit.svg" draggable="false">Add Team
        </button>
    </div>
</form>

@stop
