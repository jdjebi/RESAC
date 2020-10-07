@extends('admin.base')

@section('extras_style')
  @parent
  <link rel="stylesheet" href="{{ cdn_asset("asset/css/resac/pubs.css") }}">
  <style>
    #resac-breadcrumb .breadcrumb{
      background-color: #fff
    }
    #resac-breadcrumb .breadcrumb-item+.breadcrumb-item::before {
      content: ">";
      font-weight: 700;
    }
  </style>
@endsection

@section('main-content')
  <div id="v-app">
    <div class="nav-scroller shadow-sm">
      <nav id="resac-breadcrumb" aria-label="breadcrumb" >
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Moi</a></li>
          <li class="breadcrumb-item"><a href="#">Mes publications</a></li>
          <li class="breadcrumb-item active" aria-current="page" >Publications #{{ $post->id }}</li>
        </ol>
      </nav>
    </div>
    @include('flash')
    <div class="mt-3 container-fluid">
      <div class="row justify-content-center">
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div  class="col-sm-12">
          <div id="v-table-loader">
            @include("admin.pubs.vue_components.v_loader")   
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <div id="post" class="d-none">
            @include("admin.pubs.vue_components.post_edit_view")
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
@parent
<script type="module" src="{{ asset("asset/js/resac/init.timeago.js") }}"></script>

<script>
  var vm = new Vue({
    el: "#v-app",
    data:{
      post: null,
      url: {
        get_post: "{{ route("backend.api.post.get.by_id",$post->id) }}?content=rich-text"
      }
    },
    mounted: function (){
      $.get({
        url: this.url.get_post,
        success: function (data,status){
          vm.post = data.data;
          $("#post").removeClass('d-none');
          $("#v-table-loader").hide();
        },
        error: function (data,status,error){
          Swal2_tools_emit_basic_error();
        }
      });
    }
  });
</script>
@endsection
