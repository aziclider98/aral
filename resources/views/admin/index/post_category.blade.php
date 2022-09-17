@extends('layouts.adminLayout')
@section('title')@lang('auth.category') - {{$category_one->name}}@endsection
@section('content')
<div class="content-header pb-0">
	<div class="container-fluid">
		<div class="row mb-2">
			@include('admin.inc.push-menu')
			<div class="col-md-5 col-sm-5 col-5" >
				<h1>{{$category_one->name}}</h1>
			</div>
			<div class="col-md-3 col-sm-3 col-3 mx-auto">
	            <div class="input-group">
	            	<form action="{{ route('searchcategory',['locale' => $locale]) }}" method="get">
		                <input class="form-control border-end-0 border rounded-pill" type="search" placeholder="@lang('auth.searchintitle')" name="search" autocomplete="off" value="{{old('search')}}">
		                <input type="hidden" name="category_one" value="{{$category_one->id}}">
	                    <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="submit" style="display: inline-block;margin-top: -64.5px;margin-left: 208px;" >
		                    <i class="fa fa-search"></i>
	                    </button>
	            	</form>
	            </div>
        	</div>
			@include('admin.inc.lang_nav')

		</div>
	</div>
</div>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-12">
				{{-- Table Posts --}}
				<div class="card">
					<div class="card-header">
						@include('admin.inc.categories-nav')
					</div>
					<div class="card-body">
						<table class="table ">
							<thead>
								<tr>
									<th width="5%">№</th>
									<th width="45%">@lang('auth.title')</th>
									<th width="20%">@lang('auth.image')</th>
									<th width="15%">@lang('auth.createdat')</th>
									<th width="15%"></th>
								</tr>
							</thead>
							<tbody>
							@forelse ($posts as $post)
								<tr>
									<td>{{$loop->index + 1}}</td>
									<td>{{$post->title}}</td>
									<td><img src="{{ asset('storage/images/'.$post->image) }}" width="100%" height="120px" alt="{{$post->image}}"></td>
									<td>{{$post->created_at}}</td>
									<td>
										<a id="show" class="btn btn-warning" href="{{ route('indexadminshow', ['locale' => app()->getLocale(), 'id'=>$post->id]) }}">
											<i class="nav-icon fa-solid  fa-eye"></i><span id="showtext">@lang('auth.shownews')</span>
										</a>
										<a id="edit" class="btn btn-info" href="{{ route('editpost', ['locale' => app()->getLocale(), 'id'=>$post->id]) }}">
											<i class="nav-icon fa-solid fa-pen-to-square"></i><span id="edittext">@lang('auth.editnews')</span>
										</a>
										<form action="{{ route('destroy', ['locale' => app()->getLocale(), 'id'=>$post->id]) }}" method="POST" style="display:inline-block;">
											@csrf
											@method('DELETE')
											<button id="delete" class="btn btn-danger delete-confirm" type="submit"><i class="nav-icon fa-solid fa-trash"></i> <span id="deletetext">@lang('auth.deletenews')</span></button>
										</form>
									</td>
								</tr>
							@empty
							<tr>
								<td colspan="7" class="text-danger text-center">
								  <h2>No Posts</h2>
								</td>
							</tr>
						    @endforelse
						</tbody>
					</table>
				</div>
				<div class="col-md-12 d-flex justify-content-center">
					{{$posts->links()}}
				</div>
			</div>
		</div>
	</div>
</section>
@endsection