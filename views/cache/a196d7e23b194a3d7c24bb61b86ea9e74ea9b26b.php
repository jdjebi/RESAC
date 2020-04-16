<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= route("home") ?>">RESAC &middot <small class="">Annuaire</small></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">

      <?php if(!Auth::check()): ?>

      <li class="nav-item">
        <a class="nav-link" href="<?= route("home") ?>"><i class="fa fa-home"></i> Accueil</a>
      </li>

      <?php endif ?>

      <li class="nav-item">
        <a class="nav-link" href="<?= route("explorer") ?>"> <i class="fa fa-search"></i> Explorer</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= route("dev_news") ?>"> <i class="fa fa-rss-square"></i> Nouveautés</a>
      </li>

      <?php if(Auth::check()): ?>

      <li class="nav-item">
        <a class="nav-link" href="<?= route("profil") ?>"><i class="fa fa-user-circle"></i> Profil</a>
      </li>

      <?php endif ?>

    </ul>

    <?php if(!Auth::check()): ?>

    <ul  class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" href="<?= route("login") ?>"><i class="fa fa-sign-in-alt"></i> Connexion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= route("register") ?>"><i class="fas fa-user"></i> Créer un compte</a>
      </li>

    </ul>

    <?php endif ?>

    <?php if(Auth::check()): ?>

    <ul  class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" href="<?= route("edit") ?>"><i class="fa fa-user-cog"></i> Paramètres</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= route("logout") ?>">Déconnexion</a>
      </li>
    </ul>

    <?php endif ?>
  </div>
</nav>
<?php /**PATH C:\Users\Tidev\Documents\dev3\resac\views\blade/nav.blade.php ENDPATH**/ ?>