@extends('../default/default')

@section('title')
BDE CESI Nice Créer un événement
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
	<h1 class="my-4">Créer un événement</h1>
<hr>
	<div class="row">


		@isset($evenement)
		{!! Form::model($evenement, ['route' => ['evenements.update', $evenement->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
		<div class="form-group {!! $errors->has('nom_evenement') ? 'has-error' : '' !!}">
			{!! Form::text('nom_evenement', null, ['class' => 'form-control', 'placeholder' => 'Titre']) !!}
			{!! $errors->first('nom_evenement', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('prix_evenement') ? 'has-error' : '' !!}">
			{!! Form::number('prix_evenement', null, ['class' => 'form-control', 'placeholder' => 'Prix']) !!}
			{!! $errors->first('prix_evenement', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('lieu_evenement') ? 'has-error' : '' !!}">
			{!! Form::text('lieu_evenement', null, ['class' => 'form-control', 'placeholder' => 'Lieu']) !!}
			{!! $errors->first('lieu_evenement', '<small class="help-block">:message</small>') !!}
		</div>
		<h6>Date début : <input class="eventcrea" type="datetime-local" name="date_debut_evenement"required></h6>
		<h6>Date fin : <input class="eventcrea" type="datetime-local" name="date_fin_evenement"required></h6>
		<h6>Evénement récurrent : <input class="eventcrea" type="radio" name="recurrent"></h6>
		<div class="form-group {!! $errors->has('description_evenement') ? 'has-error' : '' !!}">
			{!! Form::text('description_evenement', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
			{!! $errors->first('description_evenement', '<small class="help-block">:message</small>') !!}
		</div>
		<input class="eventcrea" type="hidden" name="idee_evenement" value="1"/>
		{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
		{!! Form::close() !!}


		@endisset

		@empty($evenement)
		{!! Form::open(['route' => 'evenements.store']) !!}
		<div class="row">


			<div class="col-md-6">
            @include('../Photos/imgupload')
            <div class="form-group">
			{!! Form::text('url_photo', null, ['class' => 'form-control', 'placeholder' => 'Nom du fichier']) !!}
				</div>
		<div class="form-group">
			{!! Form::text('description_image_evenement', null, ['class' => 'form-control', 'placeholder' => 'Description de l\'image']) !!}
		</div>
        </div>
			<div class="col-md-6">


				<h6>Titre : <input class="eventcrea" type="text" name="nom_evenement" required></h6>
				<h6>Prix : <input class="eventcrea" type="number" name="prix_evenement"/>€</h6>
				<h6>Lieu : <input class="eventcrea" type="text" name="lieu_evenement"required></h6>
				<h6>Date début : <input class="eventcrea" type="datetime-local" name="date_debut_evenement"required></h6>
				<h6>Date fin : <input class="eventcrea" type="datetime-local" name="date_fin_evenement"required></h6>
				<h6>Description : <br><textarea class="descripEvent" type="text" name="description_evenement" required></textarea></h6>
				<h6>Evénement récurrent : <input class="eventcrea" type="radio" name="recurrent" value="1"></h6>
				<input class="eventcrea" type="hidden" name="idee_evenement" value="1"/>
				<input class="eventcrea" type="hidden" value="{{ Auth::user()->name }}&nbsp;{{ Auth::user()->firstname }}" name="auteur_evenement"/>
				{!! Form::submit('Ajouter l\'événement', ['class' => 'btn btn-primary ajoutEvent bouton_bleu']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	@endempty


	@endsection

