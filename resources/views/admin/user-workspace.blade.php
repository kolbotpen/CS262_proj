@extends('adminlayout.master')
@section('content')

<div class="container-fluid my-2">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>User</h1>
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">Add User</button>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User Table</h3>
                <div class="card-tools">
                    <div class="input-group input-group" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="20%">User</th>
                            <th width="25%">Email</th>
                            <th width="25%">Company</th>
                            <th width="15%">Team</th>
                            <th width="10%">Status</th>
                            <th width="100">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @foreach($user->companies as $company) 
                                        {{ $company->name }}, 
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($user->teams as $team)
                                        {{ $team->name }}
                                    @endforeach
                                </td>
                                <td>Active</td>
                                <td>
                                    <button class="btn btn-link" data-toggle="modal"
                                        data-target="#editUserModal-{{ $user->id }}">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger p-0"
                                            onclick="return confirm('Are you sure you want to delete this user?');">
                                            <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path ath fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit User Modal -->
                            <div class="modal fade" id="editUserModal-{{ $user->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="editUserModalLabel-{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editUserModalLabel-{{ $user->id }}">Edit User</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name-{{ $user->id }}" class="col-form-label">Name:</label>
                                                    <input type="text" class="form-control" id="name-{{ $user->id }}"
                                                        name="name" value="{{ $user->name }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email-{{ $user->id }}" class="col-form-label">Email:</label>
                                                    <input type="email" class="form-control" id="email-{{ $user->id }}"
                                                        name="email" value="{{ $user->email }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password-{{ $user->id }}"
                                                        class="col-form-label">Password:</label>
                                                    <input type="password" class="form-control"
                                                        id="password-{{ $user->id }}" name="password">
                                                    <small class="form-text text-muted">Leave blank if you don't want to
                                                        change the password.</small>
                                                </div>
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="is_admin-{{ $user->id }}" name="is_admin" {{ $user->usertype == 'admin' ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="is_admin-{{ $user->id }}">Admin</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- <div class="card-footer clearfix">
                <ul class="pagination pagination m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div> -->
        </div>
    </div>
    <!-- /.card -->

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addUserForm" method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin">
                            <label class="form-check-label" for="is_admin">Admin</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Get the search input element and the table rows
    const searchInput = document.querySelector('input[name="table_search"]');
    const tableRows = document.querySelectorAll(".table tbody tr");

    // Function to filter table rows based on search input
    function filterTableRows() {
        const searchText = searchInput.value.toLowerCase();

        tableRows.forEach(row => {
            const cells = row.querySelectorAll("td");
            const rowText = Array.from(cells).map(cell => cell.textContent.toLowerCase()).join(" ");
            row.style.display = rowText.includes(searchText) ? "" : "none";
        });
    }

    // Add event listener to search input
    searchInput.addEventListener("keyup", filterTableRows);
});
</script>
@stop