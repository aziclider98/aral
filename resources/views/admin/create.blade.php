@extends('layouts.adminLayout')
@section('title','Post Create')
@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-1 col-md-1">
				@include('admin.inc.push-menu')
			</div>
			<div class="col-md-7 col-sm-7 ">
				<h1 >Post Create</h1>
			</div>
			@include('admin.inc.goback')
			@include('admin.inc.lang_nav')
		</div>
	</div>
</div>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-12">
				<div class="card card-primary">
					<form action="{{ route('storepost', ['locale' => $locale]) }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="card-body">
							<div class="eng-card">
								<div class="eng-card-title">
									 <h4> <strong>English Post</strong> </h4>
								</div>
								<div class="eng-card-body">
									<div class="form-group">
										<label for="en_title">Post Title</label>
										<input id="en_title" type="text" class="form-control" name="en_title" value="{{old('en_title')}}" autocomplete="off">
									</div>
									@error('en_title')
					                    <div class="text-danger"> {{$message}}</div>
					                @enderror
									<div class="form-group mt-2">
										<label for="en_text">Post Text</label>
										<textarea class="summernote" name="en_text">{{old('en_text')}}</textarea>
									</div>
									@error('en_text')
					                    <div class="text-danger"> {{$message}}</div>
					                @enderror

								</div>
							</div>
							<div class="rus-card">
								<div class="rus-card-title mt-2">
									 <h4> <strong>Russian Post</strong> </h4>
								</div>
								<div class="rus-card-body">
									<div class="form-group">
										<label for="ru_title">Post Title</label>
										<input id="ru_title" type="text" class="form-control" name="ru_title" value="{{old('ru_title')}}" autocomplete="off">
									</div>
									@error('ru_title')
					                    <div class="text-danger"> {{$message}}</div>
					                @enderror
									<div class="form-group mt-2">
										<label for="ru_text">Post Text</label>
										<textarea class="summernote" name="ru_text">{{old('ru_text')}}</textarea>
									</div>
									@error('ru_text')
					                    <div class="text-danger"> {{$message}}</div>
					                @enderror
								</div>
							</div>
							<div class="uzb-card">
								<div class="uzb-card-title mt-2">
									 <h4> <strong>Uzbek Post</strong> </h4>
								</div>
								<div class="uzb-card-body">
									<div class="form-group">
										<label for="uz_title">Post Title</label>
										<input id="uz_title" type="text" class="form-control" name="uz_title" value="{{old('uz_title')}}" autocomplete="off">
									</div>
									@error('uz_title')
					                    <div class="text-danger"> {{$message}}</div>
					                @enderror
									<div class="form-group mt-2">
										<label for="uz_text">Post Text</label>
										<textarea class="summernote" name="uz_text">{{old('uz_text')}}</textarea>
									</div>
									@error('uz_text')
					                    <div class="text-danger"> {{$message}}</div>
					                @enderror
								</div>
							</div>
							<div class="qqr-card">
								<div class="qqr-card-title mt-2">
									 <h4> <strong>Karakalpak Post</strong> </h4>
								</div>
								<div class="qqr-card-body">
									<div class="form-group">
										<label for="qqr_title">Post Title</label>
										<input id="qqr_title" type="text" class="form-control" name="qqr_title" value="{{old('qqr_title')}}" autocomplete="off">
									</div>
									@error('qqr_title')
					                    <div class="text-danger"> {{$message}}</div>
					                @enderror
									<div class="form-group mt-2">
										<label for="qqr_text">Post Text</label>
										<textarea class="summernote" name="qqr_text">{{old('qqr_text')}}</textarea>
									</div>
									@error('qqr_text')
					                    <div class="text-danger"> {{$message}}</div>
					                @enderror
								</div>
							</div>
							<div class="category">
								<div class="category-title mt-2">
									 <h4> <strong>Category</strong> </h4>
								</div>
								<div class="category-body">
									<select name="category_id" class="form-select" aria-label="Default select example">
										@foreach ($categories as $category)
										  <option value="{{$category->id}}">{{$category->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="image-card mt-3">
								<div class="form-group">
									<div class="image-card-title">
									 	<h4> <strong>Image input</strong> </h4>
									</div>
									<div class="input-group">
										<input name="post_image" id="post_image"  type="file" class="form-control">
									</div>
									@error('post_image')
					                    <div class="text-danger"> {{$message}}</div>
					                @enderror
								</div>
							</div>

						</div>
						<div class="card-footer d-flex flex-row-reverse">
							<button type="submit" class="on-submit btn btn-primary">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
