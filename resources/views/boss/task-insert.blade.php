{{-- task-insert.blade.php --}}
@extends('layouts.master-workspace')
@section('content')

<div class="container">
  <div class="breadcrumb mt-4 mb-4">
    <a href="/companies" class="breadcrumb-link">Companies</a>
    <i class="arrow-right"></i>
    <a href="/tasks/{{ $teamId }}" class="breadcrumb-link">Task</a>
    <i class="arrow-right"></i>
    <a href="#" class="breadcrumb-link">Add</a>
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
            <th class="align-middle">Add</th>
            <th class="align-middle"></th>
            <th class="align-middle text-center">
            </th>
          </tr>
        </thead>
      </table>

      <form action="{{ route('upload.post') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row d-flex">
          {{-- LEFT BOX --}}
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="container m-3 text-white p-3 rounded h-100">
              <label for="title">Task Title</label>
              <input type="text" name="title" class="form-control bg-black text-white border-0 mb-2"
                placeholder="Task Title" value="" required>
              <label for="description">Description</label>
              <textarea name="description" class="form-control bg-black text-white border-0 mb-2" rows="5"
                placeholder="Task Description"></textarea>
                {{-- AUTOFILL BACK AND FOURTH --}}
                <label for="assigned_to">Assigned To</label>
                <select id="assigned_to" name="assigned_to" class="form-control bg-black text-white border-0 mb-2">
                    <option value="">Select a user</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" data-email="{{ $user->email }}" data-team-id="{{ $user->team_id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <label for="assigned_email">Assigned Email</label>
                <input type="email" id="assigned_email" name="assigned_email" class="form-control mt-b bg-black text-white border-0 mb-2" placeholder="Assigned email">
                <input type="hidden" name="team_id" value="{{ $teamId }}">
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
                {{-- <option value="In Progress">In Progress</option> --}}
                {{-- <option value="Completed">Completed</option> --}}
              </select>
              <label for="due_date">Due Date</label>
              <input type="text" id="due_date" name="due_date"
                class="form-control mt-b bg-black text-white border-0 mb-2" placeholder="Due date">
            </div>
          </div>
        </div>

        {{-- File upload section --}}
        <div class="row d-flex ps-4 pe-4">
          <div class="col-md-12">
            <div id="fileDropArea" class="p-4 text-center bg-dark text-white border rounded">
              <p class="mb-3">Drag and drop file here</p>
              <button id="uploadButton" class="btn btn-secondary mb-2">Import</button>
              <!-- Display area for uploaded files -->
              <input name="file" type="file" id="fileElem" multiple accept="*" class="left-0">
              <div id="fileListContainer" class="d-flex flex-column align-items-center">
                <div id="fileList"></div>
              </div>
            </div>
            <div class="btn-group table-border th-btn center my-3" style="background-color: #303030" role="group"
              aria-label="Button group">
              <button type="submit" class="btn btn-secondary" role="button">
                <img class="icon me-2 mt-1" src="{{ asset('assets/images/icon-submit.svg') }}" draggable="false">Submit
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Include jQuery and jQuery UI -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('assets/js/task-insert.js')}}"></script>
<script src="{{asset('assets/js/task-insert-display.js')}}"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var select = document.getElementById('assigned_to');
    var emailInput = document.getElementById('assigned_email');

    function updateEmail() {
      var selectedOption = select.options[select.selectedIndex];
      if (selectedOption) {
        var selectedUserEmail = selectedOption.getAttribute('data-email');
        if (selectedUserEmail) {
          emailInput.value = selectedUserEmail;
        }
      }
    }

    function updateMemberName() {
      var email = emailInput.value.trim();
      for (var i = 0; i < select.options.length; i++) {
        if (select.options[i].getAttribute('data-email') === email) {
          select.selectedIndex = i;
          return;
        }
      }
      select.selectedIndex = 0; // Reset to default if no match
    }

    select.addEventListener('change', updateEmail);
    emailInput.addEventListener('input', updateMemberName);

    updateEmail();
  });
</script>
<script>
  // DATE FORMAT
  $(function () {
    $("#due_date").datepicker({
      dateFormat: 'yy-mm-dd'
    });
  });

  // SELECT CURRENT DATE
  document.addEventListener("DOMContentLoaded", function () {
    var dateInput = document.getElementById('due_date');
    var today = new Date();
    var day = String(today.getDate()).padStart(2, '0');
    var month = String(today.getMonth() + 1).padStart(2, '0'); // Months are 0-based
    var year = today.getFullYear();

    var todayDate = year + '-' + month + '-' + day;
    dateInput.value = todayDate;
  });
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const assignedToSelect = document.getElementById('assigned_to');
  const teamSelect = document.querySelector('[name="team_id"]'); // Adjust the selector as needed

  teamSelect.addEventListener('change', function() {
    const selectedTeamId = this.value;
    const options = assignedToSelect.querySelectorAll('option');

    // Show only options that match the selected team
    options.forEach(option => {
      if (option.value === "" || option.dataset.teamId === selectedTeamId) {
        option.style.display = '';
      } else {
        option.style.display = 'none';
      }
    });

    // Reset the "Assigned To" dropdown to prompt selection
    assignedToSelect.value = '';
  });
});
</script>
@stop