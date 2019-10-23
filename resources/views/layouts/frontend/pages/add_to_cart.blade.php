@extends('layouts.frontend.app')
@section('title', 'Add to Cart')
@section('content')
<section id="cart_items">
		<div class="container col-sm-9">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('/')}}">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<?php
				$content = Cart::content();
			?>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $v_content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{url('storage/app/public/product/',$v_content->options->image)}}" alt="" width="70" height="70"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4>
								<p>Web ID: {{$v_content->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{$v_content->price}} tk</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
								<form action="{{ url('/update-cart/'.$v_content->rowId) }}" method="post">
                                @csrf		
									<input class="cart_quantity_input" type="text" name="qty" value="{{$v_content->qty}}" autocomplete="off" size="2">
									<input type="submit" class="btn btn-sm btn-success " value="Update" style="padding:3px 5px 3px 5px; font-size:14px;background: #FE980F; color: #fff;border-color: transparent;margin-left: 2px;">
								</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$v_content->total}} Tk</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{route('delete-to-cart',$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container col-sm-9">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{Cart::subtotal()}} Tk</span></li>
							<li>Eco Tax <span>{{Cart::tax()}} Tk</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{Cart::total()}} Tk</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<?php
								$customer_id = Session::get('customer_id');
							?>
							@if($customer_id != NULL)
							<a class="btn btn-default check_out" href="{{URL::to('check-out')}}">Check Out</a>
							@else
							<a class="btn btn-default check_out" href="{{URL::to('login-check')}}">Check Out</a>
							@endif
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection