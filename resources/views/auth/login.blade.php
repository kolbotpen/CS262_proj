<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>
	<link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="#" class="h3">Admin Panel</a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Sign in to start your session</p>
				@if($errors->any())
					<div class="alert alert-danger">
						@foreach ($errors->all() as $error)
							<p>{{ $error }}</p>
						@endforeach
					</div>
				@endif
				<form action="{{ route('admin.login') }}" method="POST">
					@csrf
					<div class="input-group mb-3">
						<input type="email" class="form-control" name="email" placeholder="Email" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="form-group row mb-0">
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
						</div>
						<div class="col-8 text-right">
						<a href="{{ url('register') }}" class="btn btn-link">
							{{ __('Register') }}
						</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
</body>

</html>