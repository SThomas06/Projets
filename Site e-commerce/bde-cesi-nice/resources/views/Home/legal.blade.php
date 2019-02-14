@extends('../default/default')

@section('title')
BDE CESI Nice Boite à idées
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
	<h1 class="my-4">Mentions légales</h1>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<p>Conformément aux dispositions des Articles 6-III et 19 de la Loi n°2004-575 du 21 juin 2004 pour la Confiance dans l'économie numérique, dite L.C.E.N., il est porté à la connaissance des utilisateurs et visiteurs du site <br> <br>


				Le site BDE-CESI-NICE est accessible à l'adresse suivante : (ci-après "le Site"). L'accès et l'utilisation du Site sont soumis aux présentes " Mentions légales" détaillées ci-après ainsi qu'aux lois et/ou règlements applicables. <br> 

				La connexion, l'utilisation et l'accès à ce Site impliquent l'acceptation intégrale et sans réserve de l'internaute de toutes les dispositions des présentes Mentions Légales. <br> <br>


				ARTICLE 1 - INFORMATIONS LÉGALES <br> <br>
				En vertu de l'Article 6 de la Loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique, il est précisé dans cet article l'identité des différents intervenants dans le cadre de sa réalisation et de son suivi. <br> <br> <br>


				ARTICLE 2 - CONFIDENTIALITE <br> <br>
				L'Editeur du site porte à la connaissance de l'Utilisateur que dans le cadre de sa navigation sur le site, ses données à caractère personnel ne sont ni traitées, ni collectées. <br> <br> <br>


				ARTICLE 4 - LOI APPLICABLE ET JURIDICTION <br> <br>
				Les présentes Mentions Légales sont régies par la loi française. En cas de différend et à défaut d'accord amiable, le litige sera porté devant les tribunaux français conformément aux règles de compétence en vigueur. <br> <br> <br>


				ARTICLE 5 - CONTACT <br> <br>
				Pour tout signalement de contenus ou d'activités illicites, l'Utilisateur peut contacter l'Éditeur à l'adresse suivante : 
				, ou par courrier recommandé avec accusé de réception adressé à l'Éditeur aux coordonnées précisées dans les présentes mentions légales. <br> <br> <br>


				Le site  BDE CESI NICE vous souhaite une excellente navigation !

			
			</p>
		</div>
	</div>
	<hr>
</div>

@endsection