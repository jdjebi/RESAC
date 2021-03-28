<ul class="nav flex-column resac-nav-ul">
    <li class="nav-item nav-pills">
      <a class='nav-link small {{ is_current_url('backend.suggestions.all') }}' href="{{ route('backend.suggestions.all') }}">Toutes les suggestions</a>
    </li>
    <li class="nav-item nav-pills">
        <a class='nav-link small {{ is_current_url('backend.suggestions.my') }}' href="{{ route('backend.suggestions.my') }}">Mes suggestions</a>
    </li>
  </ul>