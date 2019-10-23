@extends('layouts.backend.app')
@section('title', 'Add Manufacture')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">
                        <a href="{{route('admin.product.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Manage Product</a>
                    </h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">
                            <span class="label label-primary"> Add Category</span>
                        </li>
                    </ol>
                </div>
            </div>
			<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center" style="background:#317eeb;color: white;font-weight: 300;">
                            <h3 class="panel-title" style="font-weight: 300; font-size: 20px">Show Products</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">

                                	<div class="information text-center">
                                		<div class="image">
                                			<img src="{{URL::to('storage/app/public/product/',$show_product->product_image)}}" alt="product-image" width="300" height="300">
                                		</div>

	                                        <p ><strong>Product Name : </strong>{{$show_product->product_name}}</p>
	                                        <p ><strong>Product Short Description : </strong>{{$show_product->product_short_description}}</p>
	                                        <p ><strong>Product Long Description : </strong>{{$show_product->product_long_description}}</p>
	                                        <p ><strong>Product Color : </strong>{{$show_product->product_color}}</p>
	                                        <p ><strong>Product Size : </strong>{{$show_product->product_size}}</p>
	                                        <p ><strong>Product Price: </strong>{{$show_product->product_price}}</p>
                                		
                                	</div>

 								</div>
                           </div>
                        </div>
                    </div>
                
                </div> <!-- End Row -->
            </div>
        </div>
    </div> 
@endsection