
<div class="left-sidebar">
	<h2>Category</h2>
	<div class="panel-group category-products" id="accordian"><!--category-productsr-->
		
		<?php
			$show_category = DB::table('categories')
				->where(['publication_status' =>1])
				->get();
		?>
		
		@foreach($show_category as $show_category)
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"><a href="{{route('categorybyproduct',$show_category->slug)}}">{{$show_category->category_name}}</a></h4>
			</div>
		</div>
		@endforeach
	</div><!--/category-products-->

	<div class="brands_products"><!--brands_products-->
		<h2>Brands</h2>
		<?php
			$show_brand = DB::table('manufactures')
				->where(['publication_status' =>1])
				->get();
		?>
		<div class="brands-name">
			<ul class="nav nav-pills nav-stacked">
				@foreach($show_brand as $show_brand)
				<li><a href="{{route('manufacturebyproduct',$show_brand->slug)}}"> {{-- <span class="pull-right">(5)</span> --}}{{$show_brand->manufacture_name}}</a></li>
				@endforeach
			</ul>
		</div>
	</div><!--/brands_products-->
	
	<div class="price-range"><!--price-range-->
		<h2>Price Range</h2>
		<div class="well text-center">
			 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
			 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
		</div>
	</div><!--/price-range-->
	
	<div class="shipping text-center"><!--shipping-->
		<img src="images/home/shipping.jpg" alt="" />
	</div><!--/shipping-->

</div>

