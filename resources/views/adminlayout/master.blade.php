<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laravel Shop :: Administrative Panel</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="assets/css/adminlte.min.css">
		<link rel="stylesheet" href="assets/css/custom.css">
	</head>
	<body class="hold-transition sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
			@include('adminlayout.nav')
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('adminlayout.sidebar')
         	</aside>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
                    @yield('content')
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<footer>
				@include('adminlayout.footer')
			</footer>
			
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="assets/plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="assets/js/adminlte.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="assets/js/demo.js"></script>
	</body>
</html>