@extends('layouts.userLayout')
@section('title') News @endsection
@section('content')
	<div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <h2> {{$post->title}} </h2>
            </div>
            @include('user.inc.lang_nav')
        </div>
    </div>

	<div class="container mb-5">
        @include('user.inc.categories_nav')
		<div class="row">
			<div class="col-md-12 col-lg-12 col-12">
				<table class="table tabel-bordered">
					<tr>
						<th width="20%" >Post Id</th>
						<td>{{$post->id}}</td>
					</tr>
					<tr>
						<th width="20%">Post Category</th>
						<td>
							{{$post->category->name}}
						</td>
					</tr>
					<tr>
						<th width="20%">Post Title</th>
						<td>{{$post->title}}</td>
					</tr>
					<tr>
						<th width="20%">Post Text</th>
						<td>{!!$post->text!!}</td>
					</tr>
					<tr>
						<th width="10%">Post Created at</th>
						<td>{{$post->created_at}}</td>
					</tr>
				</table>
				<div class="post-image text-center mb-5">
					<div class="image-title">
						<h4>Post Image</h4>
					</div>
					<div class="image-body">
						<img src="{{ asset('storage/images/'.$post->image) }}" alt="{{$post->image}}" width="600px">
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
