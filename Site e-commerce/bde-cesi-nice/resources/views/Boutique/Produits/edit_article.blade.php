@extends('../../default/default')

@section('title')
BDE CESI Nice Modifier un article
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
	<h1 class="my-4">Modifier un article</h1>

	
	@isset($updated)
	<div class="container-fluid" style="background: green;">
		{{ $updated }}
	</div>
	@endisset
	<div class="col-sm-offset-4 col-sm-4">
		<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Modification d'un article</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::model($produit, ['route' => ['shop.update', $produit->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
					<div class="form-group {!! $errors->has('nom_produit') ? 'has-error' : '' !!}">
						{!! Form::text('nom_produit', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
						{!! $errors->first('nom_produit', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('description_produit') ? 'has-error' : '' !!}">
						{!! Form::text('description_produit', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
						{!! $errors->first('description_produit', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('quantite_produit') ? 'has-error' : '' !!}">
						{!! Form::number('quantite_produit', null, ['class' => 'form-control', 'placeholder' => 'Quantité']) !!}
						{!! $errors->first('quantite_produit', '<small class="help-block">:message</small>') !!}
					</div>
				</div>

					<!--	
					<div class="form-group {!! $errors->has('nom_categorie') ? 'has-error' : '' !!}">
					  	{!! Form::text('nom_categorie', null, ['class' => 'form-control', 'placeholder' => 'Catégorie']) !!}
					  	{!! $errors->first('nom_categorie', '<small class="help-block">:message</small>') !!}
					  </div> -->
					  
					  {!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
					  {!! Form::close() !!}
					</div>
				</div>
			</div>
			<a href="javascript:history.back()" class="btn btn-primary">
				<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
			</a>
		</div>
	</div>

	@endsection
