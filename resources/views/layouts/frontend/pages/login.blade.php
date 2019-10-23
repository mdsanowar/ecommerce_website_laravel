@extends('layouts.frontend.app')
@section('title', 'Login Checkout')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{URL::to('/customer_login')}}" method="POST">
							@csrf
							<input type="email" name="customer_email" placeholder="Email Address" required="" />
							<input type="password" name="password" placeholder="Enter Password" required="" />
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-5">
					<div class="signup-form"><!--sign up form-->
						@if ($errors->any())
						    <div class="alert alert-danger">
						        <ul>
						            @foreach ($errors->all() as $error)
						                <li>{{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>
						@endif
						<h2>New User Signup!</h2>
						<form action="{{route('register_customer')}}" method="post">
							@csrf
							<input type="text" name="customer_name" placeholder="Full Name" required="" />
							<input type="email" name="customer_email" placeholder="Email Address" required=""/>
							<input type="password" name="password" placeholder="Password" required=""/>
							<input type="text" name="moblie_number" placeholder="Enter phone" required=""/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection