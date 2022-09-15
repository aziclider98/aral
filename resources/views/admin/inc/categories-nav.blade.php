<div class="row">
	<div class="col-12 ">
		<ul class="nav nav-treeview d-flex justify-content-around" id="category">
			@foreach ($categories as $category)
			<li class="nav-item " style="width: 23%; border: 2px gray solid ; border-radius: 10px;">
					<a href="
						@if ($cat == 'En')
							{{ route('encategories', $category->id) }}
						@elseif($cat == 'Qqr')
							{{ route('qqrcategories', $category->id) }}
						@elseif($cat == 'Ru')
							{{ route('rucategories', $category->id) }}
						@elseif($cat == 'Uz')
							{{ route('uzcategories', $category->id) }}
						@endif" class="btn display-block w-100">
						 {{$category->name}}
					</a>
			</li>
			@endforeach
		</ul>
	</div>
</div>