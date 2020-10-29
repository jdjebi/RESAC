<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky">

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span><i class="fa fa-globe"></i> RESAC</span>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('actu') }}">
          Actualité
        </a>
      </li>
    </ul>

    <hr>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span><i class="fa fa-edit"></i>  PUBLICATIONS</span>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link {{ is_current_url('admin.post.create') }}" href="{{ route('admin.post.create') }}">
          Créer une publication
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ is_current_url('admin.pubs_dashboard') }}" href="{{ route('admin.pubs_dashboard') }}">
          Dernières publications
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ is_current_url('admin.post.my_posts') }}" href="{{ route('admin.post.my_posts') }}">
          Mes publications
        </a>
      </li>
    </ul>

    <hr>
    
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span><i class="fa fa-users"></i> UTILISATEURS</span>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link {{ is_current_url('admin_user_manager') }}" href="{{ route('admin_user_manager') }}">
          Membres
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          Modérateurs
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ is_current_url('admin.user.roles') }}" href="{{ route('admin.user.roles') }}">
          Rôles et permissions
        </a>
      </li>
    </ul>

    <hr>

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

    <hr>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>OUTILS DEVELOPPEUR</span>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link {{ is_current_url('admin.dev.notification.create') }}" href="{{ route('admin.dev.notification.create') }}">
          Notifications
        </a>
      </li>
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
