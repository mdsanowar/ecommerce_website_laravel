<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->
	<link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
	<style type="text/css">
		.paymentWrap {
	     padding: 50px;
         }

		.paymentWrap .paymentBtnGroup {
			max-width: 800px;
			margin: auto;
		}

		.paymentWrap .paymentBtnGroup .paymentMethod {
			padding: 40px;
			box-shadow: none;
			position: relative;
		}

		.paymentWrap .paymentBtnGroup .paymentMethod.active {
			outline: none !important;
		}

		.paymentWrap .paymentBtnGroup .paymentMethod.active .method {
			border-color: #4cd264;
			outline: none !important;
			box-shadow: 0px 3px 22px 0px #7b7b7b;
		}

		.paymentWrap .paymentBtnGroup .paymentMethod .method {
			position: absolute;
			right: 3px;
			top: 3px;
			bottom: 3px;
			left: 3px;
			background-size: contain;
			background-position: center;
			background-repeat: no-repeat;
			border: 2px solid transparent;
			transition: all 0.5s;
		}

		.paymentWrap .paymentBtnGroup .paymentMethod .method.visa {
			background-image: url("https://www.moneycrashers.com/wp-content/uploads/2014/06/reasons-carry-cash-with-you-1068x713.jpg");

		}

		.paymentWrap .paymentBtnGroup .paymentMethod .method.master-card {
			background-image: url("https://www.braintreepayments.com/images/visa-logo.svg");
			border:2px solid #cccccc82;
		}

		.paymentWrap .paymentBtnGroup .paymentMethod .method.amex {
			background-image: url("https://i2.wp.com/mikesandrik.com/wp-content/uploads/2016/12/PayPalLogo.png?resize=678%2C381");
			border:2px solid #cccccc82;
		}

		.paymentWrap .paymentBtnGroup .paymentMethod .method:hover {
		    border-color: #4cd264;
		    outline: none !important;
		 }
	</style>

</head>
<body>

	@include('layouts.frontend.pertial.header')
	
	@include('layouts.frontend.pertial.slider')
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
				   @include('layouts.frontend.pertial.sidebar')
			    </div>
				
				@yield('content')
			</div>
		</div>
	</section>
	
    @include('layouts.frontend.pertial.footer')

	<!-- SCIPTS -->

    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>

</body>
</html>
