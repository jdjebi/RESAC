<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= $accueil ?>">RESAC &middot <small class="">Annuaire</small></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">

      <?php if(!Auth::check()): ?>

      <li class="nav-item">
        <a class="nav-link" href="<?= route("home") ?>">Acceuil</a>
      </li>

      <?php endif ?>

      <li class="nav-item">
        <a class="nav-link" href="<?= route("explorer") ?>">Explorer</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= route("news") ?>">News</a>
      </li>

      <?php if(Auth::check()): ?>

      <li class="nav-item">
        <a class="nav-link" href="<?= route("profil") ?>">Profil</a>
      </li>

      <?php endif ?>

    </ul>

    <?php if(!Auth::check()): ?>

    <ul  class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" href="<?= route("login") ?>">Connexion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= route("register") ?>">Créer un compte</a>
      </li>

    </ul>

    <?php endif ?>

    <?php if(Auth::check()): ?>

    <ul  class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" href="<?= route("edit") ?>">Paramètres</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= route("logout") ?>">Déconnexion</a>
      </li>
    </ul>

    <?php endif ?>
  </div>
</nav>
