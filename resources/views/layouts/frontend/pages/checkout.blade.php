@extends('layouts.frontend.app')
@section('title', 'Checkout')
@section('content')
<section id="cart_items">
	<div class="container col-sm-9">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Check out</li>
			</ol>
		</div><!--/breadcrums-->

		<div class="register-req" style="background: #FE980F; color: #fff;font-size: 20px">
			<p>Please Fillup Checkout form..................</p>
		</div><!--/register-req-->

		<div class="shopper-informations">
			<div class="row">

				<div class="col-sm-12 clearfix">
					<div class="bill-to">
						<p>Bill To</p>
						<div class="form-one">
							<form action="{{url('/save-shipping-details')}}" method="POST">
								@csrf
								<input type="text" name="shipping_email"required="" placeholder="Email*">
								<input type="text" name="shipping_first_name"required="" placeholder="First Name *">
								<input type="text" name="shipping_last_name"required="" placeholder="Last Name *">
								<input type="text" name="shipping_address"required="" placeholder="Address *">
								<input type="text" name="shipping_mobile_number"required="" placeholder="Mobile Number">
								<input type="text" name="shipping_city"required="" placeholder="City">
								<input type="submit" name="submit" value="Done" style="background: #FE980F;color: #fff;font-size: 16px">
							</form>
						</div>
					</div>
				</div>				
			</div>
		</div>
	</div>
</section> <!--/#cart_items-->
@endsection