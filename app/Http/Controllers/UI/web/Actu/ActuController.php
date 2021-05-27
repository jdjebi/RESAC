<?php

namespace App\Http\Controllers\UI\Web\Actu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Resac\Core\Posts\PostRenderer;
use App\Http\Resources\Suggestion\SuggestionCollection as SuggestionResources;
use App\Models\Features;
use App\Models\Suggestion;
use App\Models\Comment;

class ActuController extends Controller
{

    public function index(Request $request){


      $last_feature = Features::last();

      // Récupération des suggestions à l'aide d'une ressources de modèle
      $suggestions_data = Suggestion::select('*')->limit(3)->orderBy('created_at','desc')->get();
      $suggestions_resources = new SuggestionResources($suggestions_data);
      $suggestions = $suggestions_resources->toArray($request);

      $title =  "Actualités";

      return view("app.actu",[
        'title' => $title,
        'last_feature' => $last_feature,
        'suggestions' => $suggestions,
      ]);
    }

}

?>