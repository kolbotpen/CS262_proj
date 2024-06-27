@extends('adminlayout.master')
@section('content')

<div class="container-fluid my-2">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Company</h1>
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addCompanyModal">Add Company</button>
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
                <h3 class="card-title">Company Table</h3>
                <div class="card-tools">
                    <div class="input-group input-group" style="width: 250px;">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                            id="searchInput">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button" id="searchButton">
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
                            <th width="25">#</th>
                            <th width="300">Companies</th>
                            <th width="100">Industry</th>
                            <th width="100">Visibility</th>
                            <th width="100">Code</th>
                            <th width="100">Boss</th>
                            <th width="100">Option</th>
                        </tr>
                    </thead>
                    <tbody id="companyTableBody">
                        @foreach ($companies as $index => $company)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->industry }}</td>
                                <td>{{ $company->visibility }}</td>
                                <td>{{ $company->company_code }}</td>
                                <td>{{ $company->creator->first()->name ?? 'N/A' }}</td>
                                <td>
                                    <button class="btn btn-link" onclick="editCompany({{ $company->id }})">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                    <form action="{{ route('companies.destroy', $company) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger p-0"
                                            onclick="return confirm('Are you sure you want to delete this company?');">
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

    <!-- Add Company Modal -->
    <div class="modal fade" id="addCompanyModal" tabindex="-1" role="dialog" aria-labelledby="addCompanyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCompanyModalLabel">Add Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addCompanyForm" method="POST" action="{{ route('companies.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="add_company_name" class="col-form-label">Company Name:</label>
                            <input type="text" class="form-control" id="add_company_name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="add_company_description" class="col-form-label">Description:</label>
                            <textarea class="form-control" id="add_company_description" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="add_company_industry" class="col-form-label">Industry:</label>
                            <input type="text" class="form-control" id="add_company_industry" name="industry" required>
                        </div>
                        <div class="form-group">
                            <label for="add_company_visibility" class="col-form-label">Visibility:</label>
                            <select class="form-control" id="add_company_visibility" name="visibility" required>
                                <option value="public">Public</option>
                                <option value="private">Private</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Company Modal -->
    <div class="modal fade" id="editCompanyModal" tabindex="-1" role="dialog" aria-labelledby="editCompanyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCompanyModalLabel">Edit Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editCompanyForm" method="POST" action="{{ route('companies.update', $company) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_company_name" class="col-form-label">Company Name:</label>
                            <input type="text" class="form-control" id="edit_company_name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="edit_company_description" class="col-form-label">Description:</label>
                            <textarea class="form-control" id="edit_company_description" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_company_industry" class="col-form-label">Industry:</label>
                            <input type="text" class="form-control" id="edit_company_industry" name="industry">
                        </div>
                        <div class="form-group">
                            <label for="edit_company_visibility" class="col-form-label">Visibility:</label>
                            <select class="form-control" id="edit_company_visibility" name="visibility">
                                <option value="public">Public</option>
                                <option value="private">Private</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_company_boss" class="col-form-label">Boss:</label>
                            <ul id="edit_company_boss" class="list-group">
                                <!-- Boss will be populated here by JavaScript -->
                            </ul>
                        </div>
                        <div class="form-group">
                            <label for="edit_company_users" class="col-form-label">Users(Select or Unselect to make them
                                boss):</label>
                            <ul id="edit_company_users" class="list-group">
                                <!-- Users will be populated here by JavaScript -->
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function editCompany(companyId) {
        $.ajax({
            url: `/workspace/companies/${companyId}/edit`,
            method: 'GET',
            success: function (company) {
                // Populate form fields
                $('#edit_company_name').val(company.name);
                $('#edit_company_description').val(company.description);
                $('#edit_company_industry').val(company.industry);
                $('#edit_company_visibility').val(company.visibility);

                // Populate the boss list with all users who are bosses
                $('#edit_company_boss').empty();
                let bosses = company.users.filter(user => user.pivot.is_boss);
                if (bosses.length > 0) {
                    bosses.forEach(boss => {
                        $('#edit_company_boss').append(`<li class="list-group-item">${boss.name}</li>`);
                    });
                } else {
                    $('#edit_company_boss').append(`<li class="list-group-item">N/A</li>`);
                }

                // Populate the users list with checkboxes for making a user a boss
                $('#edit_company_users').empty();
                company.users.forEach(user => {
                    const isBossChecked = user.pivot.is_boss ? 'checked' : '';
                    $('#edit_company_users').append(`
                    <li class="list-group-item">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_boss[]" id="user_${user.id}" value="${user.id}" ${isBossChecked}>
                            <label class="form-check-label" for="user_${user.id}">
                                ${user.name}
                            </label>
                        </div>
                    </li>
                `);
                });

                // Set form action dynamically
                $('#editCompanyForm').attr('action', `/workspace/companies/${companyId}`);
                $('#editCompanyModal').modal('show');
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>

<script>
    // live search functionality
    $(document).on('input', '#searchInput', function () {
        var searchText = $(this).val().toLowerCase();

        $('#companyTableBody tr').each(function () {
            var companyText = $(this).find('td:nth-child(2)').text().toLowerCase();
            if (companyText.includes(searchText)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

</script>

@endsection