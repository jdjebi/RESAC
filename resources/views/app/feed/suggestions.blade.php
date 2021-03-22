<div class="d-flex justify-content-between align-items-center mt-4">
    <div class="h6">
        Suggestions
    </div>
    <div>
        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create-suggestion"><i class="fa fa-plus"></i> Créer</a>
    </div>
</div>

<hr>

<div id="v-suggestions" class="d-none">
    <div v-for="(suggestion,i) in suggestions">

        @include('app.extras.suggestions.vue.box_suggestion')

    </div>
</div>

<div class="text-right mt-1 small">
    <a href="{{ route('backend.suggestions.all') }}">Voir tout</a>
</div>