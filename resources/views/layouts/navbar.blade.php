<div class="container d-flex align-items-center justify-content-between">
  <h1 class="logo">
    <a href="/">
      <img src="./img/perle/LOGO.png" alt="perleo LOGO"/>
    </a>
  </h1>
  <!-- Uncomment below if you prefer to use an image logo -->
  <!-- <a href="index.html" class="logo"><img src="./img/logo.png" alt="" class="img-fluid"></a>-->

  <nav id="navbar" class="navbar">
    <ul>
      @if (Route::has('login'))
            @auth
                <li><a style="color:black;" class="nav-link scrollto" href="{{ url('/') }}">Accueil</a></li>
                <li><a style="color:black;" class="nav-link scrollto" href="{{ url('/favoris') }}">Favoris</a></li>
                <li><a style="color:black;"class="nav-link scrollto" href="{{ url('/ma-carte') }}">Ma carte perleo</a></li>
                <li class="dropdown"><a style="color:black;" class="nav-link " ><span>Mon profil </span> <i class="bi bi-chevron-down"></i></a>
                  <ul>
                    <li>
                    <li><a  style="color:black;" class="nav-link scrollto" href="{{ url('/mon-compte') }}">Compte</a></li>
                      <!-- Déconnecion -->
                      <form style="color:black;" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a style="color:black;" class="nav-link scrollto" href="route('logout')" 
                               onclick="event.preventDefault(); this.closest('form').submit();">
                              Déconnexion
                            </a>
                        </form>
                    </li>
                  </ul>
                  <li><a style="color:black;" class="nav-link scrollto" href="#">Mon abonnement</a></li>
                </li>
            @else
                <li><a style="color:black;" class="nav-link scrollto" href="{{ route('login') }}">Connexion</a></li>
                @if (Route::has('register'))
                    <li><a style="color:black;" class="nav-link scrollto" href="{{ route('register') }}">Inscription</a></li>
                @endif
                <li  class="dropdown"><a style="color:black;" class="nav-link scrollto " >Perleo  <i class="bi bi-chevron-down"></i></a>
                  <ul>
                    <li><a style="color:black;" class="nav-link scrollto" href="#about">Notre structure </a></li>
                    <li><a style="color:black;" class="nav-link scrollto" href="#about-boxes">L'équipe </a></li>
                  </ul>
                </li>
            @endauth
      @endif


      <!-- <li><a class="nav-link scrollto" href="#about">FORMATION</a></li>
      <li><a class="nav-link scrollto" href="#services">COMMUNAUTE</a></li>
      <li><a class="nav-link scrollto " href="#portfolio">CONSEIL</a></li>
      <li><a class="nav-link scrollto" href="#team">EVENEMENTS</a></li>
      <li class="dropdown"><a href="#"><span>ACTUALITE</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
            <ul>
              <li><a href="#">Deep Drop Down 1</a></li> 
              <li><a href="#">Deep Drop Down 2</a></li>
              <li><a href="#">Deep Drop Down 3</a></li>
              <li><a href="#">Deep Drop Down 4</a></li>
              <li><a href="#">Deep Drop Down 5</a></li>
            </ul>
          </li>
          <li><a href="#">Drop Down 2</a></li>
          <li><a href="#">Drop Down 3</a></li>
          <li><a href="#">Drop Down 4</a></li>
        </ul>
      </li>
      <li><a class="nav-link scrollto" href="#contact">CONTACT</a></li>
      <li><a class="getstarted scrollto" href="#about">Get Diagnostic</a></li> -->
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav><!-- .navbar -->
</div>