<footer id="mobile-nav" class="footer">
   <div id="buttonGroup" class="btn-group selectors" role="group" aria-label="Basic example">
      <button id="home" type="button" class="btn btn-secondary button-active">
         <div>
           <a class="selector-holder" href="{{ route('actu') }}">
             <i class="far fa-2x fa-newspaper"></i>
             <span class="d-none d-sm-block">Actualités</span>
           </a>
         </div>
      </button>
      <button id="feed" type="button" class="btn btn-secondary">
        <div>
          <a class="selector-holder" href="{{ route('annuaire') }}">
            <i class="fa fa-2x fa-address-book"></i>
            <span class="d-none d-sm-block">Annuaire</span>
          </a>
        </div>
      </button>
      <button id="create" type="button" class="btn btn-secondary button-inactive">
        <div>
          <a class="selector-holder" href="{{ route('profil') }}">
            <i class="fa fa-2x fa-user-circle"></i>
            <span class="d-none d-sm-block">Mon Profil</span>
          </a>
        </div>
      </button>
      @if(Auth::is_admin_logged())
        <button id="account" type="button" class="btn btn-secondary button-inactive">
           <div>
             <a class="selector-holder" href="{{ route('admin_user_manager') }}">
               <i class="fa fa-2x fa-tachometer-alt"></i>
               <span class="d-none d-sm-block">Administration</span>
             </a>
           </div>
        </button>
      @endif
   </div>
</footer>
