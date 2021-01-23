<ul class="nav flex-column">
    <li class="nav-item nav-pills">
    <a class='small nav-link {{ $request->is('suggestions')? 'active':'' }}' href="{{route('app.suggestion')}}">Mes Suggestions ()</a>
    </li>
    <li class="nav-item nav-pills">
    <a class='small nav-link {{ $request->is('suggestions/notées')? 'active':'' }}' href="{{route('app.suggestion.noted')}}">Notées ()</a>
    </li>
    <li class="nav-item nav-pills">
    <a class='small nav-link {{ $request->is('suggestions/non-notées')? 'active':'' }}' href="{{route('app.suggestion.no_noted')}}">Non-notées ()</a>
    </li>
  </ul>
  
  <hr>
  
  <h6>Suggestions</h6>
  
  <ul class="nav flex-column">
    <li class="nav-item nav-pills">
    <a class='small nav-link' href="{{ route('app.suggestion.create')}}">Créer une suggestion </a>
    <a class='small nav-link' href="{{ route('app.suggestion.list')}}">Liste des suggestions </a>
    </li>

  </ul>
  