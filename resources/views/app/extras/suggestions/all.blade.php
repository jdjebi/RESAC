@extends('app.extras.suggestions.page')

@section('suggestions-header')
  Suggestions
@endsection

@section('suggestions-content')

  <div id="v-loader">
    @include('layouts.loaders.vloader')
  </div>

  <div id="sugg-grid" class="sugg-grid d-none">
    <div v-for="(suggestion,i) in suggestions">
      @include('app.extras.suggestions.vue.box_suggestion')
    </div>
  </div>

@endsection

@section('scripts')
@parent
<script src="{{ cdn_asset("asset/js/resac/core/suggestions/suggestions.vue.js") }}"></script>
<script>
  var suggestions_data = @json($suggestions);

  var vm_suggestions = SuggestionVue({
    suggestions: suggestions_data,
    vue_element: "#v-suggestions",
    loader: "#v-loader",
    grid: "#sugg-grid",
    user_auth_id: {{ UserAuth()->id }}
  });

  setInterval(function (){
    $("time.timeago").timeago();
  },500);
</script>
@endsection