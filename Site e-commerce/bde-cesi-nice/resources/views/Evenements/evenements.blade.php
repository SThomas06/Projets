@extends('../default/default')

@section('title')
BDE CESI Nice - Événements
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
	<h1 class="my-4">Liste des événements @if(Auth::user()->d_bde_user)
		<a class="btn btn-primary bouton_bleu_head_dl_photos" href="{{ asset('create_event') }}">Ajouter un événement</a>@endif</h1>
		<hr>
		@foreach ($evenements as $evenement)
		<div class="row">
			<div class="col-md-7">
				<img class="img-fluid rounded mb-3 mb-md-0" style="width: 300px" src="{{ asset('uploadphotos/'.$evenement->url_photo) }}" alt="{{ $evenement->description_image_evenement }}">
			</div>
			<div class="col-md-5">
				<h3>Événement : {{ $evenement->nom_evenement }}</h3>
				<h5>Lieu : {{ $evenement->lieu_evenement }} - Prix : {{ $evenement->prix_evenement }}</h5>
				<p>{{ $evenement->description_evenement }}</p>
				{!! link_to_route('evenements.participation', 'S\'inscrire', [$evenement->id], ['class' => 'btn btn-primary']) !!}
				@if(Auth::user()->d_bde_user){!! link_to_route('export', 'Voir la liste des inscrits', [$evenement->id], ['class' => 'btn btn-primary']) !!}
				{!! Form::open(['method' => 'DELETE', 'route' => ['evenements.destroy', $evenement->id]]) !!}
				{!! Form::submit('Supprimer', ['class' => 'btn btn-primary bouton_bleu_head_dl_photos', 'onclick' => 'return confirm(\'Vraiment supprimer cet article ?\')']) !!}
				{!! Form::close() !!}@endif
			</div>
		</div>
		<hr>
		@endforeach
	</div>
@endsection