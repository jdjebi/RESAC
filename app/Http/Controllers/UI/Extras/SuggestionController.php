<?php

namespace App\Http\Controllers\UI\Extras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Resac\Auth2;
use App\Models\Suggestion;
use App\Models\SuggestionUser as NoteSuggestion;
use App\Models\User;
use App\Http\Resources\Suggestion\SuggestionCollection as SuggestionResources;


class SuggestionController extends Controller {

    protected $user;

    public function __construct(){

        $this->user = UserAuth();

    }

    public function all(Request $request){

        // Récupération des suggestions à l'aide d'une ressources de modèle
        $suggestions_data = Suggestion::select('*')->orderBy('created_at','desc')->get();

        $suggestions_resources = (new SuggestionResources($suggestions_data));
        $suggestions = $suggestions_resources->toArray($request);

        $title = "Suggestions";

        return view('app.extras.suggestions.all',[
            'suggestions' => $suggestions,
            'title' => $title
        ]);
        
    }

    public function my_suggestions(Request $request){

        $user = UserAuth();

        $suggestions_data = $user->suggestions;


        dump($suggestions_data);

        $suggestions_resources = (new SuggestionResources($suggestions_data));
        $suggestions = $suggestions_resources->toArray($request);

        $title = "Mes suggestions";

        return view('app.extras.suggestions.my',[
            'suggestions' => $suggestions,
            'title' => $title
        ]);
        
    }
}