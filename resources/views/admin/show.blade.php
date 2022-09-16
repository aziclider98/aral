@extends('layouts.adminLayout')
@section('title'){{$post->title}}@endsection
@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2 ">
			@include('admin.inc.push-menu')
			<div class="col-sm-9 col-md-9 ">
				<h1>{{$post->title}}</h1>
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
			<div class="col-md-8 " style="left:15%">
				<div class="card">
					<div class="card-title">
						<div class="card-image">
							<img src="{{ asset('storage/images/'.$post->image) }}" alt="{{$post->image}}" width="100%">
						</div>
					</div>
					<div class="card-body">
						{!!$post->text!!}
					</div>
					<div class="card-footer">
						{{$post->created_at}}
						{{$post->category->name}}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
