@extends('app.page')

@section('extras_style')
<link rel="stylesheet" href="{{ asset('asset/mobile/css/main.css') }}">
@endsection

@section('content')
<div class="container-fluid">

   <!-- Home page -->
   <div id="page-home" class="active">
     <h1>Home Page</h1>
      <div class="block">
        <h2>The standard Lorem Ipsum passage, used since the 1500s</h2>

        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC

        "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
        1914 translation by H. Rackham
      </div>
   </div>

   <!-- Feed page -->
   <div id="page-feed" class="inactive">
     <h1>Feed Page</h1>
     <div class="block">
      <h2>The standard Lorem Ipsum passage, used since the 1500s</h2>

      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
      Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
    </div>
    <div class="block">
      <h2>The standard Lorem Ipsum passage</h2>

      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
      Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
    </div>
    <div class="block">
      <h2>The standard Lorem Ipsum passage</h2>

      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
      Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
    </div>
   </div>

   <!-- Create page -->
   <div id="page-create" class="inactive">
     <h1>Create Page</h1>
      <form>
         <div class="form-row">
            <div class="form-group col-md-6">
               <label for="inputEmail4" class="col-form-label">Email</label>
               <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
               <label for="inputPassword4" class="col-form-label">Password</label>
               <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
            </div>
         </div>
         <div class="form-group">
            <label for="inputAddress" class="col-form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
         </div>
         <div class="form-group">
            <label for="inputAddress2" class="col-form-label">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
         </div>
         <div class="form-row">
            <div class="form-group col-md-6">
               <label for="inputCity" class="col-form-label">City</label>
               <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
               <label for="inputState" class="col-form-label">State</label>
               <select id="inputState" class="form-control">Choose</select>
            </div>
            <div class="form-group col-md-2">
               <label for="inputZip" class="col-form-label">Zip</label>
               <input type="text" class="form-control" id="inputZip">
            </div>
         </div>
         <div class="form-group">
            <div class="form-check">
               <label class="form-check-label">
               <input class="form-check-input" type="checkbox"> Check me out
               </label>
            </div>
         </div>
         <button type="submit" class="btn btn-primary">Sign in</button>
      </form>
   </div>

   <!-- Account page -->
   <div id="page-account" class="inactive">
      <h2>Account Page</h2>
      <div class="block">
        <h2>The standard Lorem Ipsum passage</h2>

        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
      </div>
   </div>
</div>

<!-- Bottom Nav Bar -->
<footer class="footer">
   <div id="buttonGroup" class="btn-group selectors" role="group" aria-label="Basic example">
      <button id="home" type="button" class="btn btn-secondary button-active">
         <div class="selector-holder">
            <i class="far fa-newspaper"></i>
            <span>Actualités</span>
         </div>
      </button>
      <button id="feed" type="button" class="btn btn-secondary button-inactive">
         <div class="selector-holder">
            <i class="fa fa-address-book"></i>
            <span>Annuaire</span>
         </div>
      </button>
      <button id="create" type="button" class="btn btn-secondary button-inactive">
         <div class="selector-holder">
            <i class="fa fa-user-circle"></i>
            <span>Mon Profil</span>
         </div>
      </button>

      @if(Auth::is_admin_logged())
        <button id="account" type="button" class="btn btn-secondary button-inactive">
           <div class="selector-holder">
              <i class="fa fa-tachometer-alt"></i>
              <span>Administration</span>
           </div>
        </button>
      @endif


   </div>
</footer>
@endsection

@section('scripts')
<script src="{{ asset('asset/mobile/js/main.js') }}"></script>
@endsection
