@extends('layouts.backend.app')
@section('title', 'Add Category')
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
                            <span class="label label-primary"> Add Category</span>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Add Category</h3></div>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="{{route('admin.category.store')}}" novalidate="novalidate">
                                	@csrf
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Category Name <strong style="color: red">*</strong></label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="name" name="category_name" type="text" required="" aria-required="true">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="ccomment" class="control-label col-lg-2">Category Description <strong style="color: red">*</strong></label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control " id="ccomment" name="category_description" required="" aria-required="true"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="agree" class="control-label col-lg-2 col-sm-3">Publication status <strong style="color: red;">*</strong></label>
                                        <div class="col-lg-10 col-sm-9">
                                            <input type="checkbox" style="width: 16px" class="checkbox form-control" id="agree" name="publication_status" value="1">
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