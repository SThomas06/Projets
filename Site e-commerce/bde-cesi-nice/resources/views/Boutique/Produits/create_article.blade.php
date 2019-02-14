@extends('../../default/default')

@section('title')
BDE CESI Nice Créer un article
@endsection

@section('header')
@include('../../default/mainHeader')
@endsection

@section('footer')
@include('../../default/mainFooter')
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
	<h1 class="my-4">Créer un article</h1>
{!! Form::open(['route' => 'shop.store']) !!}
	<div class="row">
		<div class="col-md-6">
            @include('../Photos/imgupload')
            <div class="form-group">
			{!! Form::text('url_photo', null, ['class' => 'form-control', 'placeholder' => 'Nom du fichier']) !!}
				</div>
        </div>
		<div class="col-md-6">
			<h6>Titre : <input class="eventcrea" type="text" name="titre"/></h6>
          <h6>Prix : <input class="eventcrea" type="number" name="prix_produit"/>€</h6>
          <h6>Quantité : <input class="eventcrea" type="number" name="quantite_produit"/></h6>
          <h6>Description : <br><textarea class="descripEvent" type="text" name="description_produit"></textarea></h6>
			{!! Form::submit('Ajouter l\'article', ['class' => 'btn btn-primary ajoutEvent bouton_bleu']) !!}
				{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection

