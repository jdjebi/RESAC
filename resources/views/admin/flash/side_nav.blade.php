<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">

    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="#">
          <span data-feather="home"></span>
          Dashboard <span class="sr-only">(current)</span>
        </a>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>DEVELOPPEUR</span>
      <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
        <i class="fa fa-plus"></i>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dev.create_flash') }}">
          <span data-feather="file-text"></span>
          Index de recherche
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dev.create_flash') }}">
          <span data-feather="file-text"></span>
          Flash Generator
        </a>
      </li>
    </ul>
  </div>
</nav>
