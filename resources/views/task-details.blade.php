@extends('layouts.master-workspace')
@section('content')

<div class="container">
    <h1 class="mt-4">Task Details</h1>
  
    {{-- CONTAINER 1 --}}
    <div class="container bg-gray p-4 mb-4 rounded container-border">
      <div class="table-border rounded" style="overflow: hidden;">
          <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
              <thead>
                  <tr>
                      <th class="align-middle">Details</th>
                      <th class="align-middle"></th>
                      <th class="align-middle text-center">
                        <a class="btn button-gray d-inline-flex align-items-center" href="task-details-edit">
                            <img class="icon me-2 mt-1" src="assets/images/icon-edit.svg" draggable="false">Edit Task
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
                    <span class="text-gray">HTML Design</span>
                </p>
                <p>
                    <strong>Task Description:</strong><br>
                    <span class="text-gray">
                    + Create sleek and futuristic design for our website<br>
                    - Add sports car photos to the landing page<br>
                    - Add catch phrases<br>
                    - Add company email to the contact form</span>
                </p>
                <p><strong>Assigned to:</strong><br>
                    <span class="text-gray">Clark Kent - <a href="mailto:clarkkent@email.com">clarkkent@email.com</a></span>
                </p>
              </div>
            </div>
            
            {{-- RIGHT BOX --}}
            <div class="col-md-6 d-flex align-items-stretch">
              <div class="container m-3 text-white p-3 rounded h-100">
                <p><strong>Priority:</strong><br>
                    <div class="pill pill-green">Low</div>
                </p>
                <p><strong>Progress:</strong><br>
                    <div class="pill pill-green">Completed</div>
                </p>
              </div>
            </div>
          </div>
          
      </div>
  </div>
</div>

@stop
