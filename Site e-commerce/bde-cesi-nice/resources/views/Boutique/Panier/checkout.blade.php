@extends('../../default/default')

@section('title')
BDE CESI Nice Panier
@endsection

@section('header')
@include('../../default/mainHeader')
@endsection

@section('footer')
@include('../../default/mainFooter')
@endsection

@section('moreCSS')
<link rel="stylesheet" type="text/css" href="{{ asset('css/mainShoppingCart.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/mainStyle.css') }}">
<link rel="icon" type="image/png" href="{{ asset('image/icons/favicon.ico') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
@endsection

@section('moreJS')
<script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>
<script src="{{ asset('js/mainCart.js') }}"></script>
@endsection

@section('main')

<div class="container">
	<br>
	<h1>Procédure de paiement</h1>
	<h2>API PAYPAL</h2>
	<form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="/payment/add-funds/paypal">
		{{ csrf_field() }}
		<h2 class="w3-text-blue">Payment Form</h2>

		<p>Demo PayPal form - Integrating paypal in laravel</p>
		<p>    
			<div>
				<button class="btn btn-primary">Pay with PayPal</button> {!! link_to_route('shop.index', 'CB', null, ['class' => 'btn btn-primary']) !!}
			</div>
		</p>
		
	</form>
</div>

@endsection