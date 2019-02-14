@extends('../default/default')

@section('title')
BDE CESI Nice Événements
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
	<h1 class="my-4">Modifier un evenement</h1>
	<hr>
	@isset($updated)
	<div class="container-fluid" style="background: green;">
		{{ $updated }}
	</div>
	@endisset
	<div class="col-sm-offset-4 col-sm-4">
		<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Modification d'un evenement</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::model($evenements, ['route' => ['evenements.update', $evenements->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
					<div class="form-group {!! $errors->has('nom_evenement') ? 'has-error' : '' !!}">
						{!! Form::text('nom_evenement', null, ['class' => 'form-control', 'placeholder' => 'Nom event']) !!}
						{!! $errors->first('nom_evenement', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('lieu_evenement') ? 'has-error' : '' !!}">
						{!! Form::text('lieu_evenement', null, ['class' => 'form-control', 'placeholder' => 'Lieu event']) !!}
						{!! $errors->first('lieu_evenement', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('date_debut_evenement') ? 'has-error' : '' !!}">
						{!! Form::date('date_debut_evenement', null, ['class' => 'form-control', 'placeholder' => 'date debut evenement']) !!}
						{!! $errors->first('date_debut_evenement', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('date_fin_evenement') ? 'has-error' : '' !!}">
						{!! Form::date('date_fin_evenement', null, ['class' => 'form-control', 'placeholder' => 'date fin evenement']) !!}
						{!! $errors->first('date_fin_evenement', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('prix_evenement') ? 'has-error' : '' !!}">
						{!! Form::number('prix_evenement', null, ['class' => 'form-control', 'placeholder' => 'prix evenement']) !!}
						{!! $errors->first('prix_evenement', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('duree_evenement') ? 'has-error' : '' !!}">
						{!! Form::number('duree_evenement', null, ['class' => 'form-control', 'placeholder' => 'Durée evenement']) !!}
						{!! $errors->first('duree_evenement', '<small class="help-block">:message</small>') !!}
					</div>

					<div class="form-group {!! $errors->has('description_evenement') ? 'has-error' : '' !!}">
						{!! Form::text('description_evenement', null, ['class' => 'form-control', 'placeholder' => 'Description evenement']) !!}
						{!! $errors->first('description_evenement', '<small class="help-block">:message</small>') !!}
					</div>

					<div class="form-group {!! $errors->has('description_image_evenement') ? 'has-error' : '' !!}">
						{!! Form::text('description_image_evenement', null, ['class' => 'form-control', 'placeholder' => 'image description']) !!}
						{!! $errors->first('description_image_evenement', '<small class="help-block">:message</small>') !!}
					</div>

				</div>

				
				
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
