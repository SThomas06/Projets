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


<script type="text/javascript">
  document.getElementById('payer').setAttribute('href', '#');
  
  function check(){ 
    if(document.getElementById('acceptance').checked){ 
      document.getElementById('payer').setAttribute('href', 'http://localhost/Projet_Web_A2/bde-cesi-nice/public/checkout');        
    }
    else {
      alert('Vous devez accepter les conditions générales de ventes avant de pouvoir procéder au paiement');
    }
  }
</script>

@endsection

@section('main')

<div class="container">
	<br>
	<h1>Panier</h1>

  <div class="shopping-cart">

    <div class="column-labels">
      <label class="product-details">Produit</label>
      <label class="product-price">Prix</label>
      <label class="product-quantity">Quantité</label>
      <label class="product-removal">Supprimer</label>
      <label class="product-line-price">Total</label>
    </div>

    @isset($noProduct)
    <h4>
      {{ $noProduct }}
    </h4>
    @endisset
    
    @isset($produits)
    @foreach($produits as $produit)
    <div class="product">
      <div class="product-details">
        <div class="product-title">{{ $produit->nom_produit }}</div>
        <p class="product-description">{{ $produit->description_produit }}</p>
      </div>
      <div class="product-price">{{ $produit->prix_produit }}</div>
      <div class="product-quantity">
        <input type="number" value="1" min="0" max="{{ $produit->quantite_produit }}">
      </div>
      <div class="product-removal">
        {!! link_to_route('shop.delete', 'Supprimer', [$produit->id], ['class' => 'remove-product']) !!}
      </div>
      <div class="product-line-price">{{ $produit->prix_produit }}</div>
    </div>
    @endforeach

    <div class="totals">
      <div class="totals-item totals-item-total">
        <label>Total</label>
        <div class="totals-value" id="cart-total">55</div>
      </div>
    </div>


    <div class="col-md-4">
      <span><input type="checkbox" id="acceptance" required> Accepter les conditions générales de ventes</span>
    </div> 
    {!! link_to_route('shop.checkout', 'Payer', null, ['class' => 'checkout bouton_bleu_head_dl_photos', 'id' => 'payer', 'onclick' => 'check()']) !!}

    
    @endisset

  </div>
</div>

@endsection

