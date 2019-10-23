@extends('layouts.frontend.app')
@section('title', 'Manufacture by product')
@section('content')
<div class="col-sm-9 padding-right">
		<div class="features_items"><!--features_items-->
			<h2 class="title text-center">Features Items</h2>


			@foreach($productBymanufacture as $show)
			<div class="col-sm-4">
				<div class="product-image-wrapper">
					<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{url('storage/app/public/product/',$show->product_image)}}" alt="" />
								<h2>{{$show->product_price}}</h2>
								<p>{{$show->product_name}}</p>
								<a href="{{route('productDetails',$show->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
							</div>
							<div class="product-overlay">
								<div class="overlay-content">
									<h2>{{$show->product_price}}</h2>
									<p>{{$show->product_name}}</p>
									<a href="{{route('productDetails',$show->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
							</div>
					</div>
					<div class="choose">
						<ul class="nav nav-pills nav-justified">
							<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
							<li><a href="{{route('productDetails',$show->id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
						</ul>
					</div>
				</div>
			</div>
			@endforeach
		</div><!--features_items-->
</div>

@endsection