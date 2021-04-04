<ul class="nav flex-column resac-nav-ul">
    <li class="nav-item nav-pills">
      <a class='nav-link small {{ is_current_url('app.suggestions.all') }}' href="{{ route('app.suggestions.all') }}">Toutes les suggestions</a>
    </li>
    <li class="nav-item nav-pills">
        <a class='nav-link small {{ is_current_url('app.suggestions.my') }}' href="{{ route('app.suggestions.my') }}">Mes suggestions</a>
    </li>
  </ul>