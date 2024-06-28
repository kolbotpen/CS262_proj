<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backend</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h3">Admin Panel</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register as Admin</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Form inputs -->
                    <div class="mb-3">
                        <label for="name" class="form-label"><img class="icon"
                                src="{{ asset('assets/images/icon-fullname.svg') }}" draggable="false"> Full
                            name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Admin" :value="old('name')" required autofocus autocomplete="name">
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"><img class="icon"
                                src="{{ asset('assets/images/icon-email.svg') }}" draggable="false">
                            Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="admin@email.com" :value="old('email')" required autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"><img class="icon"
                                src="{{ asset('assets/images/icon-password.svg') }}" draggable="false"> Password</label>
                        <input type="password" class="form-control" id="password"
                            name="password" placeholder="••••••••" required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red" />
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label"><img class="icon"
                                src="{{ asset('assets/images/icon-password-confirm.svg') }}" draggable="false"> Confirm
                            Password</label>
                        <input type="password" class="form-control"
                            id="password_confirmation" name="password_confirmation" placeholder="••••••••" required
                            autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red" />
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary">Sign up</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('assets/js/demo.js')}}"></script>
</body>

</html>