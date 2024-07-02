@extends('adminlayout.master')
@section('content')


<div class="container-fluid my-2">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Task</h1>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="col-sm-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTaskModal">
                Add Task
            </button>
        </div>
    </div>
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Task Table</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task Title</th>
                            <th>Assigned to</th>
                            <th>Team</th>
                            <th>Description</th>
                            <th>Priority</th>
                            <th>Progress</th>
                            <th>File</th>
                            <th>Due Date</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $index => $task)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->assignedUser->name ?? 'N/A' }}</td>
                                <td>{{ $task->team->name ?? 'N/A' }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->priority }}</td>
                                <td>{{ $task->progress }}</td>
                                <td>
                                    @if($task->file_path)
                                        <a href="{{ Storage::url($task->file_path) }}" target="_blank">
                                            View file
                                        </a>
                                    @endif
                                </td>
                                <td>{{ $task->due_date }}</td>
                                <td>
                                    <!-- Task Action Buttons (Edit/Delete) -->
                                    <button class="btn btn-link" data-toggle="modal"
                                        data-target="#editTaskModal-{{ $task->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form id="delete-task-form-{{ $task->id }}"
                                        action="{{ route('task.delete', $task->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button type="button" class="btn btn-link text-danger p-0"
                                        onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('delete-task-form-{{ $task->id }}').submit();">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
        </div>
    </div>

    @foreach ($tasks as $task)
        <!-- Edit Task Modal -->
        <div class="modal fade" id="editTaskModal-{{ $task->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTaskModalLabel">Edit Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editTaskForm-{{ $task->id }}" action="{{ route('task.edit', $task->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <input type="hidden" name="team_id" id="team_id" value="{{ $task->team_id }}">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Task Title:</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-form-label">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="5"
                                    required>{{ $task->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="assigned_to" class="col-form-label">Assigned To:</label>
                                <select class="form-control" id="assigned_to" name="assigned_to">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $task->assigned_to == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="assigned_email" class="col-form-label">Assigned Email:</label>
                                <input type="email" id="assigned_email" name="assigned_email" class="form-control"
                                    value="{{ $task->assigned_email }}" required>
                            </div>

                            <div class="form-group">
                                <label for="priority" class="col-form-label">Priority:</label>
                                <select class="form-control" id="priority" name="priority">
                                    <option value="Low" {{ $task->priority == 'Low' ? 'selected' : '' }}>Low</option>
                                    <option value="Medium" {{ $task->priority == 'Medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="High" {{ $task->priority == 'High' ? 'selected' : '' }}>High</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="progress" class="col-form-label">Progress:</label>
                                <select class="form-control" id="progress" name="progress">
                                    <option value="Not Started" {{ $task->progress == 'Not Started' ? 'selected' : '' }}>Not
                                        Started</option>
                                    <option value="In Progress" {{ $task->progress == 'In Progress' ? 'selected' : '' }}>In
                                        Progress</option>
                                    <option value="Completed" {{ $task->progress == 'Completed' ? 'selected' : '' }}>Completed
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="due_date" class="col-form-label">Due Date:</label>
                                <input type="date" class="form-control" id="due_date" name="due_date"
                                    value="{{ $task->due_date }}">
                            </div>
                            @if($task->file_path)
                                <div class="form-group">
                                    <label for="current_file" class="col-form-label">Current File:</label>
                                    <p><a href="{{ Storage::url($task->file_path) }}" target="_blank">View file</a></p>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="file" class="col-form-label">File:</label>
                                <input type="file" class="form-control" id="file" name="file" accept="*">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-refresh" onclick="refreshPage()">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Adding task Modal -->
    <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTaskModalLabel">Add New Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('task.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="team_id">Team:</label>
                            <select class="form-control" id="team_id" name="team_id">
                                <option value="">Select a Team</option>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="assigned_to">Assigned To:</label>
                            <select class="form-control" id="assigned_to" name="assigned_to">
                                <option value="">Select a User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" data-email="{{ $user->email }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="assigned_email">Assigned Email:</label>
                            <input type="email" id="assigned_email" name="assigned_email" class="form-control" required>
                        </div> -->
                        <div class="form-group">
                            <label for="priority">Priority</label>
                            <select class="form-control" id="priority" name="priority" required>
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="progress">Progress:</label>
                            <select class="form-control" id="progress" name="progress">
                                <option value="Not Started">Not Started</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="due_date">Due Date:</label>
                            <input type="date" class="form-control" id="due_date" name="due_date">
                        </div>
                        <div class="form-group">
                            <label for="file">File:</label>
                            <input type="file" class="form-control" id="file" name="file" accept="*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-refresh" onclick="refreshPage()">Add Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const userSelect = document.getElementById('assigned_to');
    const emailInput = document.getElementById('assigned_email');

    userSelect.addEventListener('change', function () {
        const selectedOption = userSelect.options[userSelect.selectedIndex];
        const email = selectedOption.getAttribute('data-email');
        emailInput.value = email;
    });
});
</script>
<script>
$(document).ready(function() {
    $('#team_id').change(function() {
        var teamId = $(this).val();
        if (teamId) {
            $.ajax({
                url: '/getTeamUsers/' + teamId,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('#assigned_to').empty();
                    $('#assigned_to').append('<option value="">Select a User</option>');
                    $.each(data, function(key, value) {
                        $('#assigned_to').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
            });
        }else{
            $('#assigned_to').empty();
        }
    });
});
</script>
<script>
  function refreshPage() {
    window.location.reload();
  }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.modal').forEach(modal => {
            const form = modal.querySelector('form');
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        $(modal).modal('hide');
                        location.reload(); // Refresh page to reflect changes
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    });
</script>
<script>
   document.getElementById('team_id').addEventListener('change', function() {
  const selectedTeamId = this.value;
  const usersSelect = document.getElementById('assigned_to');
  
  // Clear current users options
  usersSelect.innerHTML = '';
  
  // Check if the selected team has any users
  if (teamToUsersMap[selectedTeamId]) {
    // Populate the users select with users from the selected team
    teamToUsersMap[selectedTeamId].forEach(user => {
      const option = document.createElement('option');
      option.value = user.id;
      option.textContent = user.name;
      usersSelect.appendChild(option);
    });
  }
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.modal').forEach(modal => {
            const form = modal.querySelector('form');
            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Prevent default form submission

                const formData = new FormData(this);
                const url = this.getAttribute('action'); // Get form action URL

                fetch(url, {
                    method: 'POST', // POST method because of Laravel's method spoofing
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data); // Log response for debugging
                        $(modal).modal('hide'); // Hide modal on successful submission
                        updateTaskList(); // Update task list without page reload
                    })
                    .catch(error => {
                        console.error('Error:', error); // Log any errors
                        alert('An error occurred while saving.'); // Alert user of error
                    });
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var users = {
            @foreach($users as $user)
                "{{ $user->id }}": "{{ $user->email }}",
            @endforeach
        };

        // Adjust this to target all instances of the dropdown
        document.querySelectorAll('[id^="assigned_to-"]').forEach(function (dropdown) {
            dropdown.addEventListener('change', function () {
                var selectedUserId = this.value;
                var userEmail = users[selectedUserId];
                // Construct the corresponding "Assigned Email" field's ID based on the dropdown's ID
                var emailFieldId = 'assigned_email-' + this.id.split('-')[1];
                document.getElementById(emailFieldId).value = userEmail;
            });
        });
    });
</script>
@stop