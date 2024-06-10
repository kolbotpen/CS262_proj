@extends('layouts.master-workspace')
@section('content')

<div class="container">
    <h1 class="mt-4 mb-4">Task</h1>
  
    {{-- CONTAINER 1 --}}
    <div class="container bg-gray p-0 rounded container-border">
      <div class="table-border rounded mb-5" style="overflow: hidden;">
          <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
              <thead>
                  <tr>
                      <th class="align-middle">Edit Task Details</th>
                      <th class="align-middle"></th>
                      <th class="align-middle text-center">
                        {{-- <a class="btn button-gray d-inline-flex align-items-center" href="task-details">
                            <img class="icon me-2 mt-1" src="assets/images/icon-edit.svg" draggable="false">Save Changes
                        </a> --}}
                    </th>
                  </tr>
              </thead>
          </table>
          
          <div class="row d-flex">
            {{-- LEFT BOX --}}
            <div class="col-md-6 d-flex align-items-stretch">
              <div class="container m-3 text-white p-3 rounded h-100">
                <label for="title">Task Title</label>
                <input type="text" name="title" class="form-control bg-black text-white border-0 mb-2" placeholder="Task Title" value="HTML Design" required>
                <label for="description">Description</label>
                <textarea name="description" class="form-control bg-black text-white border-0 mb-2" rows="5" placeholder="Task Description">
+ Create sleek and futuristic design for our website
- Add sports car photos to the landing page
- Add catch phrases
- Add company email to the contact form</textarea>
                <label for="assigned_to">Assigned To</label>
                <input type="text" name="assigned_to" class="form-control bg-black text-white border-0 mb-2"
                  placeholder="Assigned to" value="Clark Kent" required>
                <label for="title">Assigned Email</label>
                <input type="email" name="assigned_email" class="form-control mt-b bg-black text-white border-0 mb-2"
                  placeholder="Assigned email" value="clarkkent@email.com">
              </div>
            </div>
            
            {{-- RIGHT BOX --}}
            <div class="col-md-6 d-flex align-items-stretch">
              <div class="container m-3 text-white p-3 rounded h-100">
                <label for="priority">Priority</label>
                <select name="priority" class="form-select bg-black text-white border-0 mb-2" placeholder="Priority"
                  required>
                  <option value="Low" selected>Low</option>
                  <option value="Medium">Medium</option>
                  <option value="High">High</option>
                </select>
                <label for="progress">Progress</label>
                <select name="progress" class="form-select bg-black text-white border-0 mb-2" placeholder="Progress"
                  required>
                  <option value="Not Started" selected>Not Started</option>
                  <option value="In Progress">In Progress</option>
                  <option value="Completed">Completed</option>
                </select>
              </div>
            </div>
          </div>
          
        {{-- File upload section --}}
        <div class="row d-flex ps-4 pe-4">
          <div class="col-md-12">
            <div id="fileDropArea" class="p-4 text-center bg-dark text-white border rounded">
              <p class="mb-3">Drag and drop file here</p>
              <button id="uploadButton" class="btn btn-secondary mb-2">Or click here to select file(s)</button>
              <!-- Display area for uploaded files -->
              <input name="file" type="file" id="fileElem" multiple accept="*" class="left-0">
              <div id="fileListContainer" class="d-flex flex-column align-items-center">
                <div id="fileList"></div>
              </div>
            </div>
            {{-- <div class="m-3 d-flex justify-content-center"><input type="submit" class="btn btn-primary"></div> --}}
            <div class="m-3 d-flex justify-content-center">
              <a href="task-details" type="submit" class="btn button-gray d-inline-flex align-items-center justify-content-center"
                style="height: 40px;">
                <img class="icon me-2 mt-1" src="assets/images/icon-submit.svg" draggable="false">Submit
              </a>
            </div>
          </div>
        </div>

      </div>
  </div>
</div>

@stop