<style media="screen">

#resume .user-cover-pic{
  height: 80px;
}
#resume .user-photo{
  width: 90px;
  height: 90px;
  border-radius: 50%;
  position: relative;
  top: 30px;
}
#resume .resume-content{
  position: relative;
}

.resac-nav-ul .nav-link{
    padding-left: 0px;
}
</style>

<div class="media">
  <img class="wh-40 border resac-border-light-2 rounded-circle" src="{{ asset($user->photo) }}" alt="Photo {{ $user->fullname }}">
  <div class="media-body ml-2 small">
    <div>
      {{ $user->fullname }}
    </div>
    <div class="">
      {{ $user->emploi }} &middot {{ $user->universite }}
    </div>
  </div>
</div>

<hr>

<h6 class="text-muted">Publications</h6>
<ul class="nav flex-column resac-nav-ul">
  <li class="nav-item nav-pills">
    <a class='nav-link small' href="{{ route('app.post.hub') }}">Editeur de publication </a>
    <a class='nav-link small' href="{{ route('app.post.create.free') }}">
      Créer publication libre</a>
  </li>
</ul>
