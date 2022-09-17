@extends('layouts.adminLayout')
@section('title')@lang('auth.restorenews')@endsection

@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2 ">
			@include('admin.inc.push-menu')
			<div class="col-md-5 col-sm-5 col-5 ">
				<h1>@lang('auth.restorenews')</h1>
			</div>
			<div class="col-md-3 col-sm-3 col-3 mx-auto">
	            <div class="input-group">
	            	<form action="{{ route('restore.search',['locale' => $locale]) }}" method="get">
		                <input class="typeahead form-control border-end-0 border rounded-pill" type="search" placeholder="@lang('auth.searchintitle')" name="search" autocomplete="off">
	                    <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="submit" style="display: inline-block;margin-top: -64.5px;margin-left: 208px;" >
		                    <i class="fa fa-search"></i>
	                    </button>
	            	</form>
	            </div>
        	</div>
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
							<th width="5%">№</th>
							<th width="10%">@lang('auth.category')</th>
							<th width="30%">@lang('auth.title')</th>
							<th width="15%">@lang('auth.image')</th>
							<th width="12%">@lang('auth.createdat')</th>
							<th width="12$">@lang('auth.deleted')</th>
							@forelse ($posts as $post)
								<th width="16%">
									<a href="{{ route('restore.all', ['locale' => app()->getLocale()]) }}" class="btn btn-warning">
										@lang('auth.restoreall')
										@break
									</a>
								</th>
									@empty
									@endforelse
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
								<a href="{{ route('restore.one',['locale' => app()->getLocale(), 'id' => $post->id ] )}}" class="btn btn-success">@lang('auth.restore')</a>
                            </form>
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="7" class="text-danger text-center">
							  <h2> @lang('auth.nodeletednews')</h2>
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