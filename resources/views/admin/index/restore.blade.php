@extends('layouts.adminLayout')
@section('title','Restore Posts')

@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2 ">
			@include('admin.inc.push-menu')
			<div class="col-md-4 col-sm-4 col-4 ">
				<h1>Restore Posts</h1>
			</div>
			<div class="col-md-3 col-sm-3 col-3 mx-auto">
	            <div class="input-group">
	            	<form action="{{ route('restore.search',['locale' => $locale]) }}" method="get">
		                <input class="typeahead form-control border-end-0 border rounded-pill" type="search" placeholder="search in title..." name="search" autocomplete="off">
	                    <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="submit" style="display: inline-block;margin-top: -64.5px;margin-left: 208px;" >
		                    <i class="fa fa-search"></i>
	                    </button>
	            	</form>
	            </div>
        	</div>
			@include('admin.inc.goback')
			@include('admin.inc.lang_nav')
	</div>
</div>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-12">
				<table class="table ">
					<thead>
						<tr class="table_forma">
							<th width="5%">Id</th>
							<th width="10%">Category</th>
							<th width="35%">Title</th>
							<th width="15%">Image</th>
							<th width="12%">Created at</th>
							<th width="12$">Deleted at</th>
							<th width="11%"><a href="{{ route('restore.all', ['locale' => app()->getLocale()]) }}" class="btn btn-warning">
					Restore All
				</a></th>
						</tr>
					</thead>
					<tbody>
					@forelse ($posts as $post)
						<tr>
							<td>{{$loop->index + 1}}</td>
							<td>{{$post->category->name}}</td>
							<td>{{$post->title}}</td>
							<td><img src="{{ asset('storage/images/'.$post->image) }}" width="100%" height="120px" alt="{{$post->image}}"></td>

							<td>{{$post->created_at}}</td>
							<td>{{$post->deleted_at}}</td>
							<td >
								<a href="{{ route('restore.one',['locale' => app()->getLocale(), 'id' => $post->id ] )}}" class="btn btn-success">Restore</a>
                            </form>
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="7" class="text-danger text-center">
							  <h2> no deleted post </h2>
							</td>
						</tr>
					@endforelse
					</tbody>
				</table>
			</div>
			{{$posts->links()}}
		</div>
	</div>
</section>
@endsection