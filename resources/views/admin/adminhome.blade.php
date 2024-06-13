@extends('adminlayout.master')
@section('content')


<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Dashboard</h1>
		</div>
		<div class="col-sm-6">

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
			<div class="col-lg-4 col-6">
				<div class="small-box card">
					<div class="inner">
						<h3>{{ $totalCompanies }}</h3>
						<p>Total Organizations</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
					<a href="#" class="small-box-footer text-dark">More info <i
							class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>

			<div class="col-lg-4 col-6">
				<div class="small-box card">
					<div class="inner">
						<h3>{{ $totalTeams }}</h3>
						<p>Total Teams</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="#" class="small-box-footer text-dark">More info <i
							class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>

			<div class="col-lg-4 col-6">
				<div class="small-box card">
					<div class="inner">
						<h3>{{ $totalUsers }}</h3>
						<p>Total Users</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<a href="javascript:void(0);" class="small-box-footer">&nbsp;</a>
				</div>
			</div>
		</div>
	</div>
	@stop