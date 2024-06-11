@extends('adminlayout.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Setting</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="home" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>My Profile</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-6">
                                    <label for="name">Fullname</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email">Slug</label>
                                                <input type="text" name="slug" id="slug" class="form-control"
                                                    placeholder="Slug">
                                            </div>
                                        </div> -->
                            <div class="col-md-6">
                                <div class="md-6">
                                    <label for="name">Email</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="email">Role</label>
                                    <input type="text" name="usertype" id="usertype" class="form-control"
                                        placeholder="Admin">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Account</h3>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="font-weight-bold">Log in Automatically</div>
                                <div class="text-muted">Automatically login to your account</div>
                            </div>
                            <div class="custom-control custom-switch ml-auto">
                                <input type="checkbox" class="custom-control-input" id="auto-login-toggle">
                                <label class="custom-control-label" for="auto-login-toggle"></label>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email">Confirm Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pb-5 pt-3">
            <button class="btn btn-primary">Create</button>
            <a href="pages.html" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
<script>
    $(function () {
        // Summernote
        $('.summernote').summernote({
            height: '300px'
        });
    });
</script>

@stop