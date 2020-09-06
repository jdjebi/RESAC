@extends('app.page')

@section('extras_style')
  @include("app.params.style")
  <link rel="stylesheet" href="{{ cdn_asset('asset/js/lib/croppie/croppie.css') }}">
@endsection

@section('content')
<div class="container mt-4">
  <div class="row">
    <div class="col-sm-12 col-md-5 col-lg-3">    
      <nav class="menu mb-3">
        <div class="menu-heading d-flex">
          <img class="avatar avatar-user mr-2" src="{{ photos_cdn_asset($user) }}" width="32" height="32" alt="{{ $user->fullname }}">
          <div class="flex-1 lh-condensed">
            <div class="f5 text-gray-dark text-bold css-truncate css-truncate-target">{{ $user->prenom }}</div>
            <div class="f6 text-gray text-normal">Mon compte</div>
          </div>
        </div>
        <a class="menu-item" href="{{ route('edit') }}?infos">Général</a>
        <a class="menu-item" href="{{ route('edit') }}?photo">Photo de profil</a>
        <a class="menu-item" href="{{ route('edit') }}?password">Mot de passe</a>
      </nav>
    </div>
    <div class="col-sm-12 col-md-7 col-lg-8">
      
      @include('flash')

      @if($edit_form == "infos")
        <div id="infos-form">
          @include("app.params.infos")
        </div>
      @endif

      @if($edit_form == "photo")
        @include("app.params.photo")
      @endif

      @if($edit_form == "password")
        @include("app.params.pass")
      @endif
      
    </div>
  </div>
</div>

<div id="vgt" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div style="height: 300px">
          <div id="croppie-photo-uploader"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ cdn_asset("asset/js/vue.js") }}"></script>
<script type="text/javascript" src="{{ cdn_asset("asset/js/lib/croppie/croppie.min.js") }}"></script>
<script type="text/javascript">
  var infos_form_id = "#infos-form";
  var infos_form = $(infos_form_id);
  var json_countries = <?= $json_countries ?>;

  if(infos_form.length){
    infos_vm = new Vue({
      el: infos_form_id,
      data:{
        countries:json_countries
      }
    });
  }
</script>

@if($edit_form == "photo")
<script type="text/javascript">

  // Initialisation de croppie
  var $uploadCrop = $("#croppie-photo-uploader").croppie({
    viewport: {
      width: 200,
      height: 200,
      type: "circle",
    },
    boundary: {
      height: 300,
    },
  });

  var reader = new FileReader();

  reader.onload = function (event) {
    $uploadCrop.croppie('bind', {
      url: event.target.result,
    });
  };

  $('.upload-btn-wrapper button').on('click', function(e){
   
    e.preventDefault()

    $("#upload-file-input").trigger('click')

  });

  $('#upload-file-input').on('change', function(event){
    local_path = $(event.target).val();

    reader.readAsDataURL(this.files[0]);

    $("#upload-file").text(local_path);

    $('#vgt').modal('show')


  });

</script>

@endif

<script>
 
 
</script>

@endsection
