@extends('admin.base')

@section('extras_style')
  @parent
  @include('admin.user.style')
@endsection

@section('main-content')
  <div class="nav-scroller shadow-sm">
    <nav id="resac-breadcrumb" aria-label="breadcrumb" >
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin_user_profil',['user_id' => $user_visited->id]) }}">{{ $user_visited->fullname }} #{{ $user_visited->id }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profil</li>
        </ol>
    </nav>
  </div>
  @include('flash')
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-9 col-lg-7">
        @include('admin.user.profil_view')
      </div>
      <div class="col-sm-12 col-md-12 offset-lg-1 col-lg-4">
        @include('admin.user.profil_manager')
      </div>
    </div>
  </div>
@endsection

@section('scripts')
@parent
<script src="{{ asset("asset/js/extras/sweetalert2.all.min.js") }}" type="text/javascript"></script>
<script type="text/javascript">
$('#btn-delete-user').click(function(e){
  delete_user_dialog()
});
function delete_user_dialog(){
  Swal.fire({
    title:'Confirmation',
    icon: 'warning',
    text:'Voulez vous vraiment supprimer cet utilisateur',
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Oui",
    cancelButtonText: "Annuler"
  }).then( (result) => {
    if(result.value){
      window.location = "{{ route('admin_delete_user',[],false) }}?delete={{ $user_visited->id }}&redirect={{ route('admin_user_manager',[],false) }}";
    }
  });
}

</script>
@endsection
