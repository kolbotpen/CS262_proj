@extends('adminlayout.master')
@section('content')


@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row d-flex">
        {{-- LEFT BOX --}}
        <div class="col-md-6 d-flex align-items-stretch">
            <div class="container m-3 p-3 rounded h-100">
                <label for="company-name">Company Name</label>
                <input type="text" name="name" class="form-control border-0 mb-2"
                    placeholder="John Co.Ltd" value="" required>
                <label for="industry">Industry</label>
                <input type="text" name="industry" class="form-control border-0 mb-2"
                    placeholder="Automobile" value="" required>
                <label for="description">Description</label>
                <textarea name="description" class="form-control border-0 mb-2" rows="5"
                    placeholder="What the company is all about"></textarea>
            </div>
        </div>

        {{-- RIGHT BOX --}}
        <div class="col-md-6 d-flex align-items-stretch">
            <div class="container m-3 p-3 rounded h-100">
                <label for="visibility">Visibility</label>
                <select name="visibility" class="form-select border-0 mb-2" placeholder="Visibility"
                    required>
                    <option value="Public" selected>Public</option>
                    <option value="Private">Private</option>
                </select>
            </div>
        </div>
    </div>
    <div class="m-3 d-flex justify-content-center">
        <button type="submit" class="btn btn-primary d-inline-flex rounded align-items-center justify-content-center"
            style="height: 40px;">
            <img class="icon me-2 mt-1" src="assets/images/icon-submit.svg" draggable="false">Create Company
        </button>
    </div>
</form>


@stop