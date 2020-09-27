<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">

    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="#">
          <span data-feather="home"></span>
          Navigation <span class="sr-only">(current)</span>
        </a>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>RESAC</span>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('actu') }}">
          <i class="fa fa-globe"></i> Actualité
        </a>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>PUBLICATIONS</span>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link {{ is_current_url('admin.pubs_dashboard') }}" href="{{ route('admin.pubs_dashboard') }}">
          Dernières publications
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ is_current_url('admin.post.create') }}" href="{{ route('admin.post.create') }}">
          <i class="fa fa-edit"></i> Créer une publication
        </a>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>UTILISATEURS</span>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link {{ is_current_url('admin_user_manager') }}" href="{{ route('admin_user_manager') }}">
          <i class="fa fa-users"></i>  Membres
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          Modérateurs
        </a>
      </li>
    </ul>


    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>EXTRAS</span>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link {{ is_current_url('admin.feature.all') }}" href="{{ route('admin.feature.all') }}">
          <span data-feather="file-text"></span>
          Nouveautés
        </a>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>OUTILS DEVELOPPEUR</span>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link {{ is_current_url('admin.webengine.show') }}" href="{{ route('admin.webengine.show') }}">
          Index de recherche
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ is_current_url('admin.dev.create_flash') }}" href="{{ route('admin.dev.create_flash') }}">
          <span data-feather="file-text"></span>
          Flash Generator
        </a>
      </li>
    </ul>


  </div>
</nav>
