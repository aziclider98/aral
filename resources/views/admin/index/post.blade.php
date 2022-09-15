@extends('layouts.adminLayout')
@section('title')
	@switch($cat)
	    @case('En')
			English Posts
			@break
		@case('Ru')
			Russian Posts
			@break
	    @case('Uz')
			Uzbek Posts
			@break
		@case('Qqr')
			Karakalpak Posts
	        @break
	@endswitch
@endsection

@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			@include('admin.inc.push-menu')
			<div class="col-md-6 col-sm-6 col-6" >
				<h1>
					@switch($cat)
					    @case('En')
							English Posts
							@break
						@case('Ru')
							Russian Posts
							@break
					    @case('Uz')
							Uzbek Posts
							@break
						@case('Qqr')
							Karakalpak Posts
					        @break
					@endswitch
				</h1>
			</div>
			<div class="col-md-3 col-sm-3 col-3 ">
	            <div class="input-group">
	            	<form action="{{ route('search') }}" method="get">
		                <input class="typeahead form-control border-end-0 border rounded-pill" type="search" placeholder="search in title..." name="search" autocomplete="off" >
		                <input type="hidden" name="lang" value="{{$cat}}">
	                    <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="submit" style="display: inline-block;margin-top: -64.5px;margin-left: 208px;" >
		                    <i class="fa fa-search"></i>
	                    </button>
	            	</form>
	            </div>
        	</div>
			<div class="col-md-2 col-sm-2 col-2" >
				<a href="{{ url()->previous()}} " class="btn btn-danger">Go Back</a>
			</div>
		</div>

	</div>
</div>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-12">
				<div class="card">
					<div class="card-header">
						@include('admin.inc.categories-nav')
					</div>
					<div class="card-body">
						<table class="table ">
							<thead>
								<tr class="table_forma">
									<th width="5%">Id</th>
									<th width="10%">Category</th>
									<th width="35%">Title</th>
									<th width="20%">Image</th>
									<th width="15%">Created at</th>
									<th width="15%"></th>
								</tr>
							</thead>
							<tbody>
								@forelse ($posts as $post)
									<tr>
										<td>{{$loop->index + 1}}</td>
										<td>{{$post->category['name']}}</td>
										<td>{{$post->title}}</td>
										<td><img src="{{ asset('storage/images/'.$post->image) }}" width="100%" height="120px" alt="{{$post->image}}"></td>

										<td>{{$post->created_at}}</td>
										<td>
											<a href="
												@switch($cat)
												    @case('En')
														{{ route('showenposts', $post->id) }}
														@break
													@case('Ru')
														{{ route('showqqrposts', $post->id) }}
														@break
												    @case('Uz')
														{{ route('showruposts', $post->id) }}
														@break
													@case('Qqr')
														{{ route('showuzposts', $post->id) }}
												        @break
												@endswitch
											"class="btn btn-warning" id="show">
												<i class="nav-icon fa-solid fa-eye"></i><span id="showtext">Show Post</span>
													</a>
											<a id="edit" href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">
												<i class="nav-icon fa-solid fa-pen-to-square"></i>
													<span id="edittext" >Edit Post</span>
											</a>
											<form  action="{{ route('posts.destroy',$post->id) }}" method="POST" style="display:inline-block">
												@csrf
												@method('DELETE')
												<button id="delete"  class="btn btn-danger delete-confirm" type="submit"><i class="nav-icon fa-solid fa-trash"></i><span id="deletetext">Delete Post</span>
													</button>

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
				</div>
			</div>

			<div class="col-md-12 d-flex justify-content-center">
				{{$posts->links()}}
			</div>
		</div>
	</div>
</section>
@endsection
