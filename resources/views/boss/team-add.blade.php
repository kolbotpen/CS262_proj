@extends('layouts.master-workspace')
@section('content')


@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="container">
  <div class="breadcrumb mt-4 mb-4">
    <a href="/companies" class="breadcrumb-link">Companies</a>
    <i class="arrow-right"></i>
    <a href="#" class="breadcrumb-link">Add Team</a>
  </div>
  
  @if (session('status') === 'upload-success')
    <div class="alert alert-success">
    Upload success!
    </div>
  @endif
  {{-- CONTAINER 1 --}}
  <div class="container bg-gray p-0 rounded container-border">
    <div class="table-container table-border rounded mb-5">
      <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
        <thead>
          <tr>
            <th class="align-middle">Add Team</th>
            <th class="align-middle"></th>
            <th class="align-middle text-center"></th>
          </tr>
        </thead>
      </table>

      <form action="{{ route('teams.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row d-flex">
          {{-- LEFT BOX --}}
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="container m-3 text-white p-3 rounded h-100">
              <label for="name">Team name</label>
              <input type="text" name="name" class="form-control bg-black text-white border-0" placeholder="Team name"
                value="" required>
            </div>
          </div>

          {{-- RIGHT BOX --}}
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="container m-3 text-white p-3 rounded h-100">
                <label for="company_id">Select Company</label>
                <select name="company_id" class="form-select bg-black border-0" required>
                    <option value="">Select Company</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
          </div>
        </div>
        </div>
        <div class="btn-group table-border th-btn center my-3" style="background-color: #303030" role="group" aria-label="Button group">
          <button type="submit" class="btn btn-secondary" role="button">
            <img class="icon me-2 mt-1" src="assets/images/icon-submit.svg" draggable="false">Submit
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

@stop