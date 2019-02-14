<section id="nav-test">
  <div id="nav-container">
    <ul>
      <img id="logoHeader" alt="LogoBDE" src="{{ asset('image/logo_bde.png') }}"/>
      <li class="nav-li active-nav"><a href="{{ asset('home') }}"><i class="fas fa-home">&nbsp;</i> Accueil</a></li>
      <li class="nav-li"><a href="{{ asset('evenements') }}"><i class="far fa-calendar-alt">&nbsp;</i>Événements</a></li>
      <li class="nav-li"><a href="{{ asset('box') }}"><i class="fas fa-box">&nbsp;</i>Boite à idées</a></li>
      <li class="nav-li"><a href="{{ asset('photos') }}"><i class="far fa-image">&nbsp;</i>Photos</a></li>
      <li class="nav-li"><a href="{{ asset('compte') }}"><i class="fas fa-user">&nbsp;</i>Mon compte</a></li>
      
      <li class="nav-li"><a href="{{ asset('shop') }}"><i class="fas fa-shopping-basket">&nbsp;</i>Boutique</a></li>
      <li class="nav-li"><a href="{{ asset('cart') }}"><i class="fas fa-shopping-cart">&nbsp;</i>Panier</a></li>
      <li class="nav-li"><a href="{{ asset('contact') }}"><i class="fas fa-at">&nbsp;</i>Contact</a></li>
      @guest
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
      </li>
      @if (Route::has('register'))
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
      </li>
      @endif
      @else
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->firstname }} <span class="caret"></span></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: black;"> {{ __('Logout') }} </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
      @endguest
    </ul>
  </div>
</section>