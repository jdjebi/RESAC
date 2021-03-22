@extends('app.extras.suggestions.page')

@section('suggestions-header')
  Mes suggestions ({{ count($suggestions) }})
@endsection

@section('suggestions-content')

  <div id="v-loader">
    @include('layouts.loaders.vloader')
  </div>

  <div id="sugg-grid" class="sugg-grid d-none">
    <div v-for="(suggestion,i) in suggestions">
      @include('app.extras.suggestions.vue.user_suggestion')
    </div>
  </div>

  @include('app.extras.suggestions.vue.modal_edit')

@endsection

@section('scripts')
@parent
<script src="{{ cdn_asset("asset/js/extras/sweetalert2.all.min.js") }}" type="text/javascript"></script>
<script src="{{ cdn_asset("asset/js/resac/swal2.confirm.js") }}" type="text/javascript"></script>
<script src="{{ cdn_asset("asset/js/resac/core/suggestions/mysuggestions.vue.js") }}"></script>
<script>
  var suggestions_data = @json($suggestions);

  var vm_suggestions = MySuggestionVue({
    suggestions: suggestions_data,
    vue_element: "#v-suggestions",
    loader: "#v-loader",
    grid: "#sugg-grid",
    edit_modal:"#update-suggestion"
  });

  setInterval(function (){
    x = $("time.timeago").timeago();
  },500);
</script>
@endsection