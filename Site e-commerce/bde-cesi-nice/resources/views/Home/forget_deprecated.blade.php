@extends('../default/default')

@section('title')
BDE CESI Nice Création de Compte
@endsection

@section('moreCSS')
<link rel="icon" type="image/png" href="{{ asset('image/icons/favicon.ico') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/mainConnexion.css') }}">
@endsection

@section('moreJS')
<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>
<script src="{{ asset('js/mainConnexion.js') }}"></script>
@endsection

@section('main')


<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<form class="login100-form validate-form">
				<span class="login100-form-title p-b-26">
					BDE CESI Nice
				</span>
				<span >
					<img id="logoCo" alt="LogoBDE" src="{{ asset('image/logo_bde.png') }}"/>
				</span>

				<div class="wrap-input100 validate-input" data-validate = "Votre mail n'est pas valide">
					<input class="input100" type="text" name="email">
					<span class="focus-input100" data-placeholder="Email"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Ce champ est obligatoire">
					<input class="input100" type="text" name="nom">
					<span class="focus-input100" data-placeholder="Votre nom"></span>
				</div>

				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button class="login100-form-btn">
							M'envoyer le mail
						</button>
					</div>
				</div>
				<div class="text-center p-t-115">
					<span class="txt1">
						Vous pouvez enfin vous connectez ?
					</span>
					<a class="txt2" href="{{ asset('login') }}">
						Allez-y
					</a>
				</div>
			</form>
		</div>
	</div>
</div>





@endsection