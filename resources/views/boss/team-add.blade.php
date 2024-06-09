@extends('layouts.master-workspace')
@section('content')

<div class="container">
  <h1 class="mt-4 mb-4">Team</h1>
  @if (session('status') === 'upload-success')
    <div class="alert alert-success">
    Upload success!
    </div>
  @endif
  {{-- CONTAINER 1 --}}
  <div class="container bg-gray p-0 rounded container-border">
    <div class="table-border rounded mb-5" style="overflow: hidden;">
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
              <label for="team_no">Team No.</label>
              <select name="team_no" class="form-select bg-black text-white border-0" disabled>
                <option value="1" selected>1</option>
              </select>
            </div>
          </div>
        </div>
        <div class="m-3 d-flex justify-content-center">
          <button type="submit" class="btn button-gray d-inline-flex align-items-center justify-content-center"
            style="height: 40px;">
            <img class="icon me-2 mt-1" src="assets/images/icon-submit.svg" draggable="false">Submit
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

@stop