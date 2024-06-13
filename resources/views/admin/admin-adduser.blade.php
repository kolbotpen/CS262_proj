@extends('adminlayout.master')
@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        {{-- LEFT BOX --}}
        <div class="col-md-6">
            <div class="container m-3 p-3 rounded">
                <label for="name">Username</label>
                <input type="text" name="name" class="form-control border-0" placeholder="Username" value="" required>
            </div>
        </div>
    </div>
    <div class="row">
        {{-- EMAIL FIELD --}}
        <div class="col-md-6">
            <div class="container m-3 p-3 rounded">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control border-0" placeholder="Email" value="" required>
            </div>
        </div>
    </div>
    <div class="row">
        {{-- PASSWORD FIELD --}}
        <div class="col-md-6">
            <div class="container m-3 p-3 rounded">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control border-0" placeholder="Password" value="" required>
            </div>
        </div>
    </div>
    <div class="row">
        {{-- ADMIN PRIVILEGES CHECKBOX --}}
        <div class="col-md-6">
            <div class="container m-3 p-3 rounded">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_admin" id="is_admin">
                    <label class="form-check-label" for="is_admin">
                        Admin Privileges
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="m-3 d-flex justify-content-center">
        <button type="submit" class="btn btn-primary d-inline-flex rounded align-items-center justify-content-center" style="height: 40px;">
            <img class="icon me-2 mt-1" src="{{ asset('assets/images/icon-submit.svg') }}" draggable="false">Add User
        </button>
    </div>
</form>

@stop
