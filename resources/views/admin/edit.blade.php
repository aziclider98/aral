@extends('layouts.adminLayout')
@section('title')@lang('auth.updatenews')@endsection
@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			@include('admin.inc.push-menu')
			<div class="col-md-8 col-sm-8 " >
				<h1>@lang('auth.updatenews')</h1>
			</div>
			@include('admin.inc.lang_nav')
		</div>
	</div>
</div>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-12">
				<div class="card card-primary">
					<form action="{{ route('updatepost', ['locale' =>$locale, 'id' => $en_post->id]) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="card-body">
							<div class="eng-card">
								<div class="eng-card-title">
									 <h4> <strong>@lang('auth.english')</strong> </h4>
								</div>
								<div class="eng-card-body">
									<div class="form-group">
										<label for="en_title">@lang('auth.newstitle')</label>
										<input id="en_title" type="text" class="form-control @error('en_title') is-invalid @enderror" name="en_title" value="{{$en_post->title}}" autocomplete="off">
									</div>
									@error('en_title')
					                    <div class="text-danger"  style="margin-top: -15px"> {{$message}}</div>
					                @enderror
									<div class="form-group">
										<label for="en_text">@lang('auth.newstext')</label>
										<textarea class="summernote" name="en_text">{{$en_post->text}}</textarea>
									</div>
									@error('en_text')
					                    <div class="text-danger"  style="margin-top: -15px"> {{$message}}</div>
					                @enderror

								</div>
							</div>
							<div class="rus-card">
								<div class="rus-card-title">
									 <h4> <strong>@lang('auth.russian')</strong> </h4>
								</div>
								<div class="rus-card-body">
									<div class="form-group">
										<label for="ru_title">@lang('auth.newstitle')</label>
										<input id="ru_title" type="text" class="form-control @error('ru_title') is-invalid @enderror" name="ru_title" value="{{$ru_post->title}}" autocomplete="off">
									</div>
									@error('ru_title')
					                    <div class="text-danger"  style="margin-top: -15px"> {{$message}}</div>
					                @enderror
									<div class="form-group">
										<label for="ru_text">@lang('auth.newstext')</label>
										<textarea class="summernote" name="ru_text">{{$ru_post->text}}</textarea>
									</div>
									@error('ru_text')
					                    <div class="text-danger"  style="margin-top: -15px"> {{$message}}</div>
					                @enderror
								</div>
							</div>
							<div class="uzb-card">
								<div class="uzb-card-title">
									 <h4> <strong>@lang('auth.uzbek')</strong> </h4>
								</div>
								<div class="uzb-card-body">
									<div class="form-group">
										<label for="uz_title">@lang('auth.newstitle')</label>
										<input id="uz_title" type="text" class="form-control @error('uz_title') is-invalid @enderror" name="uz_title" value="{{$uz_post->title}}" autocomplete="off">
									</div>
									@error('uz_title')
					                    <div class="text-danger"  style="margin-top: -15px"> {{$message}}</div>
					                @enderror
									<div class="form-group">
										<label for="uz_text">@lang('auth.newstext')</label>
										<textarea class="summernote" name="uz_text">{{$uz_post->text}}</textarea>
									</div>
									@error('uz_text')
					                    <div class="text-danger"  style="margin-top: -15px"> {{$message}}</div>
					                @enderror
								</div>
							</div>
							<div class="qqr-card">
								<div class="qqr-card-title">
									 <h4> <strong>@lang('auth.karakalpak')</strong> </h4>
								</div>
								<div class="qqr-card-body">
									<div class="form-group">
										<label for="qqr_title">@lang('auth.newstitle')</label>
										<input id="qqr_title" type="text" class="form-control @error('qqr_title') is-invalid @enderror" name="qqr_title" value="{{$qqr_post->title}}" autocomplete="off">
									</div>
									@error('qqr_title')
					                    <div class="text-danger"  style="margin-top: -15px" > {{$message}}</div>
					                @enderror
									<div class="form-group">
										<label for="qqr_text">@lang('auth.newstext')</label>
										<textarea class="summernote" name="qqr_text">{{$qqr_post->text}}</textarea>
									</div>
									@error('qqr_text')
					                    <div class="text-danger"  style="margin-top: -15px" > {{$message}}</div>
					                @enderror
								</div>
							</div>
							<div class="category">
								<div class="category-title">
									 <h4> <strong>@lang('auth.category')</strong> </h4>
								</div>
								<div class="category-body">
									<select name="category_id" class="form-select" aria-label="Default select example">
										@foreach ($en_categories as $en_category)
										  <option value="{{$en_category->id}}" @if ($en_post->en_category_id == $en_category->id)
										  	selected
										  @endif >{{$en_category->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="image-card mt-3">
								<div class="form-group">
									<div class="image-card-title">
									 	<h4><strong>@lang('auth.chooseanimage')</strong> </h4>
									</div>
									<div class="image">
										<img src="{{ asset('storage/images/'.$en_post->image)}}" alt="{{$en_post->image}}" width="100px">
									</div>
									<div class="input-group mt-3">
										<input name="post_image" id="post_image"  type="file" class="form-control" value="">
									</div>
									@error('post_image')
					                    <div class="text-danger"   style="margin-top: -15px"> {{$message}}</div>
					                @enderror
								</div>
							</div>

						</div>
						<div class="card-footer d-flex flex-row-reverse">
							<button type="submit" class="on-submit btn btn-primary">@lang('auth.update')</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection