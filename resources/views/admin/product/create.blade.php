@extends('layouts.backend.app')
@section('title', 'Add Product')
@section('content')
    <div class="content">
        <div class="container">
        	<div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">
                        <a href="{{route('admin.dashboard')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                    </h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">
                            <span class="label label-primary"> Add Product</span>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Add Product</h3></div>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="{{route('admin.product.store')}}" enctype="multipart/form-data" novalidate="novalidate">
                                	@csrf
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Product Name <strong style="color: red">*</strong></label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="name" name="product_name" type="text" required="" aria-required="true">
                                        </div>
                                    </div>

                                    <?php 
                                   	  $category_show = DB::table('categories')
                                   	  	->where(['publication_status' => 1])
                                   	  	->get();
                                    ?> 
                                    <div class="form-group ">
                                        <label for="ccomment" class="control-label col-lg-2">Category <strong style="color: red">*</strong></label>
                                        <div class="col-lg-10">
                                            <select class="mdb-select lg-form form-control" name="category_id">
                                            <option value="" disabled selected>Choose your option</option>
											 @foreach($category_show as $show_category)
											  <option value="{{$show_category->id}}">{{$show_category->category_name}}</option>
											 @endforeach 
											</select>
                                        </div>
                                    </div>

                                    
                                    <div class="form-group ">
                                        <label for="ccomment" class="control-label col-lg-2">Manufacture <strong style="color: red">*</strong></label>

                                        <?php 
                                   	    $manufacture_show = DB::table('manufactures')
                                   	    	->where(['publication_status' => 1])
                                   	    	->get();
                                    	?> 
                                        <div class="col-lg-10">
                                            <select class="mdb-select lg-form form-control" name="manufacture_id">
											  <option value="" disabled selected>Choose your option</option>
											  @foreach($manufacture_show as $show_manufacture)
											  <option value="{{$show_manufacture->id}}">{{$show_manufacture->manufacture_name}}</option>
											  @endforeach
											</select>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="ccomment" class="control-label col-lg-2">Product Short Description <strong style="color: red">*</strong></label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control " id="ccomment" name="product_short_description" required="" aria-required="true"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="ccomment" class="control-label col-lg-2">Product Long Description <strong style="color: red">*</strong></label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control " id="ccomment" name="product_long_description" required="" aria-required="true"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Product Price <strong style="color: red">*</strong></label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="name" name="product_price" type="text" required="" aria-required="true">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Product Size <strong style="color: red">*</strong></label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="name" name="product_size" type="text" required="" aria-required="true">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Product Color <strong style="color: red">*</strong></label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="name" name="product_color" type="text" required="" aria-required="true">
                                        </div>
                                    </div>


                                    <div class="form-group ">
                                        <label for="agree" class="control-label col-lg-2 col-sm-3">Publication status <strong style="color: red;">*</strong></label>
                                        <div class="col-lg-10 col-sm-9">
                                            <input type="checkbox" style="width: 16px" class="checkbox form-control" id="agree" name="publication_status" value="1">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Product Image <strong style="color: red">*</strong></label>
                                        <div class="col-lg-10">
                                            <input type="file" name="product_image" required="" aria-required="true">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-success waves-effect waves-light" type="submit">Save</button>
                                            <button class="btn btn-default waves-effect" type="button">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- .form -->
                        </div> <!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col -->

            </div> <!-- End row -->
        </div>
    </div>
@endsection