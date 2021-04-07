<style>
.selector-holder{
    color: #5c6469;
    font-weight: 500;
} 

.selector-holder.dropdown-toggle::after{
    display: none;
} 
</style>
<footer id="mobile-nav" class="footer">
   <div id="buttonGroup" class="btn-group selectors" role="group" aria-label="Basic example">
      <button id="home" type="button" class="btn button-active">
         <div>
           <a class="selector-holder" href="{{ route('actu') }}">
             <i class="far fa-newspaper"></i>
             <span>Actualités</span>
           </a>
         </div>
      </button>
      <button id="feed" type="button" class="btn">
        <div>
          <a class="selector-holder" href="{{ route('annuaire') }}">
            <i class="fa fa-address-book"></i>
            <span>Annuaire</span>
          </a>
        </div>
      </button>
      <button id="feed" type="button" class="btn">
        <div class="dropdown">
          <a class="selector-holder dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-plus-circle"></i>
            <span>Créer</span>
          </a>
        
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            @can("post-manage")
            <a class="dropdown-item" href="{{ route('admin.post.create.libre') }}">Publication</a>
            @endcan
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#create-suggestion">Suggestions</a>
          </div>
        </div>

      </button>
      @if(UserAuth()::is_staff_user())
        <button id="account" type="button" class="btn button-inactive">
           <div>
             <a class="selector-holder" href="{{ route('admin.users.index') }}">
               <i class="fa fa-tachometer-alt"></i>
               <span>Admin</span>
             </a>
           </div>
        </button>
      @endif
   </div>
</footer>
