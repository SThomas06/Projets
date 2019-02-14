@extends('../default/default')

@section('title')
BDE CESI Nice - Mon Compte
@endsection

@section('header')
@include('../default/mainHeader')
@endsection

@section('footer')
@include('../default/mainFooter')
@endsection

@section('moreCSS')
<link rel="stylesheet" type="text/css" href="{{ asset('css/headerStyle.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/footerStyle.css') }}">
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
<script src="{{ asset('js/mainConnexion.js') }}"></script>
<script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>
@endsection

@section('main')
<div class="container">
	<h1 class="my-4">Mon Compte @if(Auth::user()->d_bde_user)<a class="btn btn-primary bouton_bleu_head_dl_photos" style="margin-left: 40%" href="{{ asset('utilisateurs') }}">Gestion des utilisateurs</a>@endif</h1>
	<hr>
	@isset($updated)
	<div class="container-fluid" style="background: green;">
		{{ $updated }}
	</div>
	@endisset

	<div class="col-sm-offset-4 col-sm-4">
		<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Modification des informations</div><br>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::model($utilisateur, ['route' => ['utilisateurs.update', $utilisateur->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
					<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
						{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
						{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('fisrtname') ? 'has-error' : '' !!}">
						{!! Form::text('firstname', null, ['class' => 'form-control', 'placeholder' => 'Prénom']) !!}
						{!! $errors->first('firstname', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
						{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
						{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
						<div class="form-group ">
							<input class="form-control" placeholder="Mot de passe" name="password" type="password" value="">
						</div>
						{!! $errors->first('password', '<small class="help-block">:message</small>') !!}
					</div>
					{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right bouton_bleu_head_dl_photos']) !!}
					{!! Form::close() !!}
				</form>
			</div>
@endsection