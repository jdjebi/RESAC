<ul class="nav flex-column resac-nav-ul">
    <li class="nav-item nav-pills">
        <a class='nav-link small' href="{{ route('app.suggestions.all') }}">Suggestions</a>
    </li>
    @can("post-manage")
    <li class="nav-item nav-pills">
        <a class='nav-link small' href="{{ route('admin.post.create.libre') }}">Créer une publication</a>
    </li>
    @endcan
</ul>