@extends('layouts.master-workspace')

@section('content')
<div class="container">
  <div class="breadcrumb mt-4 mb-4">
    <a href="#" class="breadcrumb-link">Companies</a>
    <i class="arrow-right"></i>
    <a href="/task" class="breadcrumb-link">Task</a>
    <i class="arrow-right"></i>
    <a href="#" class="breadcrumb-link">Details</a>
  </div>

  {{-- CONTAINER 1 --}}
  <div class="container bg-gray p-0 rounded container-border">
    <div class="table-container table-border rounded mb-5">
      <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
        <thead>
          <tr>
            <th class="align-middle">Details</th>
            <th class="align-middle"></th>
            <th class="align-middle text-center">
              <div class="btn-group table-border th-btn" style="background-color: #303030" role="group"
                aria-label="Button group">
                <a class="btn btn-secondary" href="{{ url('task-details-edit/' . $task->id) }}" role="button">
                  <img class="icon me-2" src="{{asset('assets/images/icon-edit.svg')}}" draggable="false">Edit
                </a>
              </div>
            </th>
          </tr>
        </thead>
      </table>

      <div class="row d-flex">
        {{-- LEFT BOX --}}
        <div class="col-md-6 d-flex align-items-stretch">
          <div class="container m-3 text-white p-3 rounded h-100">
            <p><strong>Task Title:</strong><br>
              <span class="text-gray">{{ $task->title }}</span>
            </p>
            <p>
              <strong>Task Description:</strong><br>
              <span class="text-gray">{{ $task->description }}</span>
            </p>
            <p><strong>Assigned to:</strong><br>
              <span class="text-gray">{{ $task->assigned_to }} - <a
                  href="mailto:{{ $task->assigned_email }}">{{ $task->assigned_email }}</a></span>
            </p>
          </div>
        </div>

        {{-- RIGHT BOX --}}
        <div class="col-md-6 d-flex align-items-stretch">
          <div class="container m-3 text-white p-3 rounded h-100">
            <p><strong>Priority:</strong><br>
            <div
              class="pill {{ $task->priority == 'Low' ? 'pill-green' : ($task->priority == 'Medium' ? 'pill-yellow' : 'pill-red') }}">
              {{ $task->priority }}
            </div>
            </p>
            <p><strong>Progress:</strong><br>
            <div
              class="pill {{ $task->progress == 'Completed' ? 'pill-green' : ($task->progress == 'In Progress' ? 'pill-yellow' : '') }} ">
              {{ $task->progress }}
            </div>
            </p>
            @if($task->file_path)
              <small>Current file: <a href="{{ Storage::url($task->file_path) }}" target="_blank">View file</a></small>
            @endif
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@stop