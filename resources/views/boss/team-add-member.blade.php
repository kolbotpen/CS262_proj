@extends('layouts.master-workspace')
@section('content')

<div class="container">
  <div class="breadcrumb mt-4 mb-4">
    <a href="/companies" class="breadcrumb-link">Companies</a>
    <i class="arrow-right"></i>
    <a href="/team" class="breadcrumb-link">Team</a>
    <i class="arrow-right"></i>
    <a href="#" class="breadcrumb-link">Add Member</a>
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
            <th class="align-middle">Add Member</th>
            <th class="align-middle"></th>
            <th class="align-middle text-center"></th>
          </tr>
        </thead>
      </table>

      <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row d-flex">
          {{-- LEFT BOX --}}
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="container m-3 text-white p-3 rounded h-100">
              <label for="full_name">Fullname</label>
              <input type="text" name="full_name" class="form-control bg-black text-white border-0 mb-2" placeholder="Full Name" value="" required>
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control bg-black text-white border-0 mb-2" placeholder="Email" required>
            </div>
          </div>

          {{-- RIGHT BOX --}}
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="container m-3 text-white p-3 rounded h-100">
              <label for="team_no">Team No.</label>
              <select name="team_no" class="form-select bg-black text-white border-0">
                  <option value="1" selected>1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
              </select>
            </div>
          </div>
        </div>
        <div class="m-3 d-flex justify-content-center">
          <button type="submit" class="btn button-gray d-inline-flex align-items-center justify-content-center" style="height: 40px;">
            <img class="icon me-2 mt-1" src="assets/images/icon-submit.svg" draggable="false">Submit
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

@stop
