@extends('layouts.master-workspace')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="container">
    <div class="breadcrumb mt-4 mb-4">
        <a href="/companies" class="breadcrumb-link">Companies</a>
        <i class="arrow-right"></i>
        <a href="/tasks/{{ $teamId }}" class="breadcrumb-link">Task</a>
        <i class="arrow-right"></i>
        <a href="#" class="breadcrumb-link">Edit</a>
    </div>
    <div class="container bg-gray p-0 rounded container-border">
        <form action="{{ route('task.edit', $task->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="table-container table-border rounded mb-5">
                <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
                    <thead>
                        <tr>
                            <th class="align-middle">Edit</th>
                            <th class="align-middle"></th>
                            <th class="align-middle text-center">
                                <div class="btn-group table-border th-btn" style="background-color: #303030" role="group"
                                  aria-label="Button group">
                                  <a class="btn btn-secondary" href="{{ url('task-details/' . $task->id) }}" role="button">
                                    <img class="icon me-2" src="{{asset('assets/images/icon-cross.svg')}}" style="transform: scale(0.7)" draggable="false">Discard
                                  </a>
                                </div>
                              </th>
                        </tr>
                    </thead>
                </table>
                <div class="row d-flex">
                    <div class="col-md-6 d-flex align-items-stretch">
                        <div class="container m-3 text-white p-3 rounded h-100">
                            <div class="form-group">
                                <label for="title">Task Title</label>
                                <input type="text" class="form-control bg-black text-white border-0 mb-2" id="title" name="title" value="{{ $task->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control bg-black text-white border-0 mb-2" id="description" name="description" rows="5" required>{{ $task->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="assigned_to">Assigned To</label>
                                <select class="form-control bg-black text-white border-0 mb-2" id="assigned_to" name="assigned_to">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $task->assigned_to == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <label for="assigned_email">Assigned Email</label>
                                <input type="email" id="assigned_email" name="assigned_email" class="form-control mt-b bg-black text-white border-0 mb-2" value="{{ $task->assigned_email }}" placeholder="Assigned email">
                                <input type="hidden" name="team_id" value="{{ $teamId }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch">
                        <div class="container m-3 text-white p-3 rounded h-100">
                            <div class="form-group">
                                <label for="priority">Priority</label>
                                <select class="form-select bg-black text-white border-0 mb-2" id="priority" name="priority">
                                    <option value="Low" {{ $task->priority == 'Low' ? 'selected' : '' }}>Low</option>
                                    <option value="Medium" {{ $task->priority == 'Medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="High" {{ $task->priority == 'High' ? 'selected' : '' }}>High</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="progress">Progress</label>
                                <select class="form-select bg-black text-white border-0 mb-2" id="progress" name="progress">
                                    <option value="Not Started" {{ $task->progress == 'Not Started' ? 'selected' : '' }}>Not Started</option>
                                    <option value="In Progress" {{ $task->progress == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="Completed" {{ $task->progress == 'Completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="due_date">Due Date</label>
                                <input type="date" class="form-control bg-black text-white border-0 mb-2" id="due_date" name="due_date" value="{{ $task->due_date }}">
                            </div>
                            @if($task->file_path)
                                <small>Current file: <a href="{{ Storage::url($task->file_path) }}" target="_blank">View file</a></small>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row d-flex ps-4 pe-4">
                    <div class="col-md-12">
                        <div id="fileDropArea" class="p-4 text-center bg-dark text-white border rounded">
                            <p class="mb-3">Drag and drop file here</p>
                            <button id="uploadButton" class="btn btn-secondary mb-2 table-border" type="button">Import</button>
                            <input name="file" type="file" id="fileElem" multiple accept="*" class="left-0 d-none">
                            <div id="fileListContainer" class="d-flex flex-column align-items-center">
                                <div id="fileList"></div>
                            </div>
                        </div>
                        <div class="btn-group table-border th-btn center my-3" style="background-color: #303030" role="group" aria-label="Button group">
                            <button type="submit" class="btn btn-secondary">
                                <img class="icon me-2" src="{{ asset('assets/images/icon-submit.svg') }}" draggable="false">Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('uploadButton').addEventListener('click', function() {
    document.getElementById('fileElem').click();
});

document.getElementById('fileElem').addEventListener('change', function() {
    var fileList = document.getElementById('fileList');
    fileList.innerHTML = '';
    for (var i = 0; i < this.files.length; i++) {
        var li = document.createElement('li');
        li.textContent = this.files[i].name;
        fileList.appendChild(li);
    }
});

document.getElementById('assigned_to').addEventListener('change', function() {
    var userId = this.value;
    var users = @json($users);
    var user = users.find(user => user.id == userId);
    document.getElementById('assigned_email').value = user ? user.email : '';
});
</script>
@stop
