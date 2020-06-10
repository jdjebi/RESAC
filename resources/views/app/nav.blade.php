<style media="screen">
  .nav-extras-items{
    visibility: visible;
    display: block;
  }

  .notif-badge{
    font-size: 11px;
    padding: 1px 3px 1px 3px;
    border-radius: 2px;
    background-color: #2196f3;
    color: #fff
  }
  @media (min-width: 992px){
    .nav-extras-items{
      visibility: hidden;
      display: none;
    }
  }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand resac-logo-font resac-logo-25" href="{{ route("home") }}">Resac</a>
  <div class="d-flex align-items-center">
    <div class="nav-extras-items">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route("dev_news") }}">
            <i class="far fa-lightbulb" style="color: #2196f3; font-size: 21px"></i>
          </a>
        </li>
      </ul>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="border-color: transparent;">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>

  <div class="collapse navbar-collapse" id="navbarNav">

    @auth
    <form class="d-none d-md-block d-lg-block" action="{{ route("app.search",[],false) }}" method="GET" class="has-search form-inline my-2 my-lg-0 pt-1">
      <input name="q" type="text" class="form-control form-control-sm" placeholder="Rechercher un utilisateur" value="{{ isset($_GET['q']) ? $_GET['q'] : '' }}">
    </form>
    @endauth


    <ul class="navbar-nav mr-auto">

      @auth
      <li class="nav-item">
        <a class="nav-link" href="{{ route("home") }}"><i class="fa fa-home"></i> Accueil</a>
      </li>
      @endauth

      @auth
      <li class="nav-item d-none d-md-block d-lg-block">
        <a class="nav-link" href="{{ route("actu") }}"><i class="far fa-newspaper"></i> Actualités</a>
      </li>
      @endauth

      <li class="nav-item d-none d-md-block d-lg-block">
        <a class="nav-link" href="{{ route("annuaire") }}"> <i class="fa fa-address-book"></i> Annuaire</a>
      </li>

      <li class="nav-item d-none d-md-block d-lg-block">
        <a class="nav-link" href="{{ route("dev_news") }}"> <i class="far fa-lightbulb" style="color: #2196f3"></i> Nouveautés</a>
      </li>

    </ul>

    @guest
    <ul  class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route("login") }}"><i class="fa fa-sign-in-alt"></i> Connexion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route("register") }}"><i class="fas fa-user"></i> Créer un compte</a>
      </li>
    </ul>
    @endguest

    @auth
    <ul  class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" href="{{ route("profil") }}"><i class="fa fa-user-circle"></i> {{ $user->prenom }}</a>
      </li>
      @if(Resac\Auth2::is_admin_logged())
        <li class="nav-item">
          <a class="nav-link" href="{{ route("admin_user_manager") }}"><i class="fa fa-tachometer-alt"></i> Administration</a>
        </li>
      @endif

      <li class="nav-item">
        <a class="nav-link" href="{{ route("edit") }}"><i class="fa fa-user-cog"></i> Paramètres</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route("logout") }}"><i class="fa fa-sign-out-alt"></i> Déconnexion</a>
      </li>
    </ul>
    @endauth

  </div>
</nav>

@auth
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <form action="{{ route("app.search",[],false) }}" method="GET" class="has-search form-inline my-2 my-lg-0 pt-1">
        <input id="mobile-search-bar" name="q" type="text" class="form-control form-control-md" placeholder="Rechercher un utilisateur" value="{{ isset($_GET['q']) ? $_GET['q'] : '' }}">
      </form>
    </div>
  </div>
</div>
@endauth
