<style>
  .resac-form-search{
    background: #ffffff20; 
    color:white; 
    border-radius: 13px !important;
  }
  .resac-form-search::placeholder {
    color:rgb(173, 170, 170);
  }
  .notification {
    text-decoration: none;
    position: relative;
  }
  .notification .badge {
    position: absolute;
    top: 2px;
    left: 15px;
    padding: 3px;
    border-radius: 3px;
    background: #2196F3;
    color: white;
  }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="{{ route("admin.users.index") }}">
    <img src="{{ cdn_asset('asset/imgs/icons/android-chrome-512x512-admin.png') }}" width="30" height="30" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    @if(Auth::check())
    <form action="{{ route("admin_search",[],false) }}" method="GET" class="has-search form-inline my-2 my-lg-0">
      <input name="q" type="text" class="resac-form-search form-control form-control-sm" placeholder="Rechercher un utilisateur" value="{{ isset($_GET['q']) ? $_GET['q'] : '' }}">
    </form>
    @endif
    <ul class="navbar-nav mr-auto">
      @if(Auth::check())
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.post.create.libre') }}"><i class="fa fa-plus"></i> Nouvelle publications</a>
      </li>
      <li class="nav-item notification notification-badge">
        <a class="nav-link" href="{{ route('admin.notifications.show') }}"><i class="fa fa-bell"></i> <span class="badge">{{ UserAuth()->count_notifications}}</span>&nbsp; Notifications</a>
      </li>
      @endif
    </ul>

    @if(Auth::check())

    <ul  class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route("profil") }}"><i class="fa fa-user-circle"></i> {{ UserAuth()->prenom }}</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route("compte.index") }}"><i class="fa fa-user-cog"></i> Paramètres</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route("admin.logout") }}"><i class="fa fa-sign-out-alt"></i> Déconnexion</a>
      </li>
    </ul>

    @endif
  </div>
</nav>
