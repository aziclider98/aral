<div class="row">
	<div class="col-12 ">
		<ul class="nav nav-treeview d-flex justify-content-around" id="category">
			@foreach ($categories as $category)
			<li class="nav-item " style="width: 23%; border: 2px gray solid ; border-radius: 10px;">
					<a href="{{ route('indexadmincategory',['locale' => app()->getLocale(), 'id' => $category->id ])}}" class="btn w-100">
						 {{$category->name}}
					</a >
			</li>
			@endforeach
		</ul>
	</div>
</div>