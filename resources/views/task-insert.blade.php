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

      <div class="row d-flex">
        {{-- LEFT BOX --}}
        <div class="col-md-6 d-flex align-items-stretch">
          <div class="container m-3 text-white p-3 rounded h-100">
            <p><strong>Task Title:</strong><br>
              <input type="text" class="form-control bg-black text-white border-0" value="HTML Design">
            </p>
            <p>
              <strong>Task Description:</strong><br>
              <textarea class="form-control bg-black text-white border-0" rows="5">+ Create sleek and futuristic design for our website
- Add sports car photos to the landing page
- Add catch phrases
- Add company email to the contact form</textarea>
            </p>
            <p><strong>Assigned to:</strong><br>
              <input type="text" class="form-control bg-black text-white border-0" value="Clark Kent">
              <input type="email" class="form-control mt-2 bg-black text-white border-0" value="clarkkent@email.com">
            </p>
          </div>
        </div>

        {{-- RIGHT BOX --}}
        <div class="col-md-6 d-flex align-items-stretch">
          <div class="container m-3 text-white p-3 rounded h-100">
            <p><strong>Priority:</strong><br>
              <select class="form-select bg-black text-white border-0">
                <option selected>Low</option>
                <option>Medium</option>
                <option>High</option>
              </select>
            </p>
            <p><strong>Progress:</strong><br>
              <select class="form-select bg-black text-white border-0">
                <option selected>Completed</option>
                <option>In Progress</option>
                <option>Not Started</option>
              </select>
            </p>
          </div>
        </div>
      </div>
      <form method="POST" action="{{route('upload.post')}}" enctype="multipart/form-data">
        @csrf
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