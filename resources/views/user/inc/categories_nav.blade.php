
	<div class="col-md-12">
		<ul class="nav nav-treeview " id="category">
			@foreach ($categories as $category)
				<li class="nav-item " style="width: 25%;">
					<a href="
						@if ($lang == 'En')
							{{ route('newsencategories', $category->id) }}
						@elseif($lang == 'Qqr')
							{{ route('newsqqrcategories', $category->id)}}
						@elseif($lang == 'Ru')
							{{ route('newsrucategories', $category->id) }}
						@elseif($lang == 'Uz')
							{{ route('newsuzcategories', $category->id) }}
						@endif" class=" btn ">
						 {{$category->name}}
					</a>
				</li>
			@endforeach
		</ul>
	</div>

