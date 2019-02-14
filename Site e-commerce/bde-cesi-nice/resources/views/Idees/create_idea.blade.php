@extends('../default/default')

@section('title')
BDE CESI Nice Apporter une idée
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
<script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>
@endsection

@section('main')
<div class="container">
	<h1 class="my-4">Apporter une idée</h1>
<hr>

	<div class="row">
		{!! Form::open(['route' => 'box.store']) !!}
		<div class="col-md-7">
			<h6>Titre : <input class="eventcrea" type="text" name="titre"/></h6>
			<h6>Prix : <input class="eventcrea" type="number" name="prix"/>€</h6>
			<h6>Lieu : <input class="eventcrea" type="text" name="lieu_evenement"/></h6>
			<h6>Date début : <input class="eventcrea" type="datetime-local" name="date_debut"/></h6>
			<h6>Date fin : <input class="eventcrea" type="datetime-local" name="date_fin"/></h6>
			<h6>Description : <br><textarea class="descripEvent" type="text" name="description_evenement"></textarea></h6>
			<input class="eventcrea" type="hidden" name="idee_evenement" value="0"/>
			<input class="eventcrea" type="hidden" value="{{ Auth::user()->name }}&nbsp;{{ Auth::user()->firstname }}" name="auteur_evenement"/>
			{!! Form::submit('Enregistrer l\'idée', ['class' => 'btn btn-primary ajoutEvent bouton_bleu']) !!}
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection
