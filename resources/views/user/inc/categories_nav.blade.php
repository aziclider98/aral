
	<div class="col-md-12">
		<ul class="nav nav-treeview " id="category">
			@foreach ($categories as $category)
				<li class="nav-item " style="width: 25%;">
					<a class="btn w-100" href="{{ route('newscategory', [ 'locale' => app()->getLocale(), 'id' => $category->id])}}">
						 {{$category->name}}
					</a>
				</li>
			@endforeach
		</ul>
	</div>

