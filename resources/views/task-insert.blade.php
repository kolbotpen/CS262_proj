@extends('layouts.master-workspace')
@section('content')

<div class="container">
  <h1 class="mt-4">Add Task</h1>
  @if (session('status') === 'upload-success')
    <div class="alert alert-success">
    Upload success!
    </div>
  @endif
  {{-- CONTAINER 1 --}}
  <div class="container bg-gray p-4 mb-4 rounded container-border">
    <div class="table-border rounded" style="overflow: hidden;">
      <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
        <thead>
          <tr>
            <th class="align-middle">Insert File</th>
            <th class="align-middle"></th>
            <th class="align-middle text-center">
              <a class="btn button-gray d-inline-flex align-items-center" href="task-details">
                <img class="icon me-2 mt-1" src="assets/images/icon-submit.svg" draggable="false">Submit
              </a>
            </th>
          </tr>
        </thead>
      </table>

    <form action="{{route('upload.post')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row d-flex">
          {{-- LEFT BOX --}}
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="container m-3 text-white p-3 rounded h-100">
              <input type="text" name="title" class="form-control bg-black text-white border-0" placeholder="Task Title"
                value="">
              <textarea name="description" class="form-control bg-black text-white border-0 mt-3" rows="5"
                placeholder="Task Description"></textarea>
              <input type="text" name="assigned_to" class="form-control bg-black text-white border-0 mt-3"
                placeholder="Assigned to">
              <input type="email" name="assigned_email" class="form-control mt-2 bg-black text-white border-0"
                placeholder="Assigned email">
            </div>
          </div>

          {{-- RIGHT BOX --}}
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="container m-3 text-white p-3 rounded h-100">
              <select name="priority" class="form-select bg-black text-white border-0" placeholder="Priority">
                <option value="Low" selected>Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
              </select>
              <select name="progress" class="form-select bg-black text-white border-0 mt-3" placeholder="Progress">
                <option value="Completed" selected>Completed</option>
                <option value="In Progress">In Progress</option>
                <option value="Not Started">Not Started</option>
              </select>
            </div>
          </div>
        </div>
      <!-- </form>

      <form method="POST" action="{{route('upload.post')}}" enctype="multipart/form-data"> -->
      <!-- @csrf -->
      <div class="row d-flex p-4">
        <div class="col-md-12">
          <div id="fileDropArea" class="p-5 text-center bg-dark text-white border rounded">
            <p class="mb-4">Drag and drop file here</p>
            <input name="file" type="file" id="fileElem" multiple accept="image/*,.zip,.pdf" style="display:none">
            <button id="uploadButton" class="btn btn-secondary">Or click here to select file(s)</button>
          </div>
          <div class="m-3 d-flex justify-content-center"><input type="submit" class="btn btn-primary"></div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>

<script src="{{asset('assets/js/task-insert.js')}}"></script>
<script>
  document.getElementById('uploadButton').addEventListener('click', function (e) {
    e.preventDefault();
    document.getElementById('fileElem').click();
  });
</script>

@stop