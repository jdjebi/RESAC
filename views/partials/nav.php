<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= $accueil ?>">Youco</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="<?= route("explorer") ?>">Explorer</a>
      </li>

      <?php if(!Auth::check()): ?>

      <li class="nav-item">
        <a class="nav-link" href="<?= $login ?>">Connexion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= $register ?>">Créer un compte</a>
      </li>

      <?php endif ?>

      <?php if(Auth::check()): ?>

      <li class="nav-item">
        <a class="nav-link" href="<?= route("profil") ?>">Profil</a>
      </li>

      <?php endif ?>

    </ul>
    <ul  class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= route("logout") ?>">Déconnexion</a>
      </li>
    </ul>
  </div>
</nav>
