@extends('layouts.backend.app')
@section('title', 'Add Category')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">
                        <a href="{{route('admin.order.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Manage Order</a>
                    </h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">
                            <span class="label label-primary"> Show Order</span>
                        </li>
                    </ol>
                </div>
            </div>
			<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center" style="background:#317eeb;color: white;font-weight: 300;">
                            <h3 class="panel-title" style="font-weight: 300; font-size: 20px">Show Order</h3>
                        </div>
                        <div class="panel-body">
                                <div class="row">
                                       <div class="col-lg-4 col-sm-12 col-md-4">
                                            <div class="portlet">
                                                <div class="portlet-heading bg-info">
                                                    <h3 class="portlet-title text-white">
                                                        CUSTOMER INFORMATION
                                                    </h3>
                                                    <div class="portlet-widgets">
                                                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                                        <span class="divider"></span>
                                                        <a data-toggle="collapse" data-parent="#accordion1" href="#bg-default"><i class="ion-minus-round"></i></a>
                                                        <span class="divider"></span>
                                                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div id="bg-default" class="panel-collapse collapse in">
                                                    <div class="portlet-body">
                                                        <p class="card-text"><strong>Customer-name: </strong>{{$order_show->customer_name}}</p>
                                                        <p class="card-text"><strong>Customer-Email: </strong>{{$order_show->customer_email}}</p>
                                                        <p class="card-text"><strong>Customer-Number: </strong>{{$order_show->moblie_number}}</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-md-4">
                                            <div class="portlet">
                                                <div class="portlet-heading bg-info">
                                                    <h3 class="portlet-title text-white">
                                                        PAYMENT INFORMATION
                                                    </h3>
                                                    <div class="portlet-widgets">
                                                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                                        <span class="divider"></span>
                                                        <a data-toggle="collapse" data-parent="#accordion1" href="#bg-default"><i class="ion-minus-round"></i></a>
                                                        <span class="divider"></span>
                                                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div id="bg-default" class="panel-collapse collapse in">
                                                    <div class="portlet-body">
                                                        <p class="card-text"><strong>Payment Id : </strong> {{$order_show->payment_id}}</p>
                                                         <p class="card-text"><strong>Payment: </strong> {{$order_show->payment_method}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-12 col-md-4">
                                            <div class="portlet">
                                                <div class="portlet-heading bg-info">
                                                    <h3 class="portlet-title text-white">
                                                        SHIPPING INFORMATION
                                                    </h3>
                                                    <div class="portlet-widgets">
                                                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                                        <span class="divider"></span>
                                                        <a data-toggle="collapse" data-parent="#accordion1" href="#bg-default"><i class="ion-minus-round"></i></a>
                                                        <span class="divider"></span>
                                                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div id="bg-default" class="panel-collapse collapse in">
                                                    <div class="portlet-body">
                                                        <p class="card-text"><strong>Shipping Email : </strong> {{$order_show->shipping_email}} </p>
                                                        <p class="card-text"><strong>Shipping Name : </strong> {{$order_show->shipping_first_name}} {{$order_show->shipping_last_name}}</p>
                                                        <p class="card-text"><strong>Shipping Address : </strong> {{$order_show->shipping_address}} </p>
                                                        <p class="card-text"><strong>Shipping Mobile Number : </strong> {{$order_show->shipping_mobile_number}} </p>
                                                        <p class="card-text"><strong>Shipping Mobile Number : </strong> {{$order_show->shipping_city}} </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                          <div class="portlet">
                                                <div class="portlet-heading bg-info">
                                                    <h3 class="portlet-title text-white">
                                                        ORDER INFORMATION
                                                    </h3>
                                                    <div class="portlet-widgets">
                                                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                                        <span class="divider"></span>
                                                        <a data-toggle="collapse" data-parent="#accordion1" href="#bg-default"><i class="ion-minus-round"></i></a>
                                                        <span class="divider"></span>
                                                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div id="bg-default" class="panel-collapse collapse in">
                                                    <div class="portlet-body">
                                                        <p class="card-text"><strong>Total : </strong> {{$order_show->order_total}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                      </div>
                                    </div>
 								</div>
                           </div>
                        </div>
                    </div>
                
                </div> <!-- End Row -->
                

@endsection