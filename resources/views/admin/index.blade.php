@extends('layouts.adminLayout')
@section('title','Home Page')
@section('content')
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				@include('admin.inc.push-menu')
				<div class="col-md-9 col-sm-9" >
					<h1>Home Page</h1>
				</div>
				<div class="col-md-2 col-sm-2">
					<a href="{{ url()->previous()}} " class="btn btn-danger">Go Back</a>
				</div>
			</div>

		</div>
	</div>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-6 col-md-4">
					<div class="small-box bg-info">
						<div class="inner">
							<h3>Eng</h3>
							<p>Posts</p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="{{ route('enposts') }}" class="small-box-footer">Show All <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-6 col-md-4">
					<div class="small-box bg-success">
						<div class="inner">
							<h3>Rus</h3>
							<p>Posts</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="{{ route('ruposts') }}" class="small-box-footer">Show All <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-6 col-md-4">
					<div class="small-box bg-warning">
						<div class="inner">
							<h3>Uzb</h3>
							<p>Posts</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<a href="{{ route('uzposts') }}" class="small-box-footer">Show All<i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-6 col-md-4">
					<div class="small-box bg-danger">
						<div class="inner">
							<h3>Qqr</h3>
							<p>Posts</p>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
						<a href="{{ route('qqrposts') }}" class="small-box-footer">Show All <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection