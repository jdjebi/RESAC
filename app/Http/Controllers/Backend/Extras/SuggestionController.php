<?php

namespace App\Http\Controllers\Backend\Extras;

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

        dump(Suggestion::all());
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
        $suggestions_resources = (new SuggestionResources($suggestions_data));
        $suggestions = $suggestions_resources->toArray($request);

        $title = "Mes suggestions";

        return view('app.extras.suggestions.my',[
            'suggestions' => $suggestions,
            'title' => $title
        ]);
        
    }

    public function create_suggestion(Request $request)
    {
        if($request->filled('content')){

            $content_limit = 255;

            $content = $request->content;

            if(strlen($content) < $content_limit){

                $user = UserAuth();

                Suggestion::create([
                    "user_author_id" => $user->id,
                    "content" => $request->content
                ]);
            
                \Flash::add("Suggestion enregistrée, mais pas encore notée.","success");

            }else{
                \Flash::add("Suggestion invalide, vous avez excédé les 255 caractères.","danger");
            }
        }else{
            \Flash::add("Suggestion invalide. Renseigner un contenu.","danger");
        }

        return redirect()->back();
            
    }

    public function update(Request $request, $id)
    {
        $suggestion = Suggestion::findOrFail($id);

        if($request->filled('content')){

            $content_limit = 255;

            $content = $request->content;

            if(strlen($content) < $content_limit){

                $suggestion->update([
                    "content" => $request->content
                ]);
            
                \Flash::add("Modification enregistrée.","success");

            }else{
                \Flash::add("Suggestion invalide, vous avez excédé les 255 caractères.","danger");
            }
        }else{
            \Flash::add("Suggestion invalide. Renseigner un contenu.","danger");
        }

        return redirect()->back();
            
    }

    public function note2_suggestion(Request $request, $id)
    {
        $user = UserAuth();
        $note = $request->note;

        $suggestion = Suggestion::findOrFail($id);

        if ($note < 0 || $note > 5) {
            \Flash::add("Note incorrecte","danger");
            return redirect()->back();
        }

        NoteSuggestion::create([
            'suggestion_id' => $suggestion->id,
            'user_id' => $user->id,
            'note' => $note,
        ]);

        \Flash::add("Note enregistrées","success");

        return redirect()->back();     
    }

    public function delete(Request $request, $id){

        $suggestion = Suggestion::findOrFail($id);

        $user = UserAuth();

        if($suggestion->user->id == $user->id){
            $suggestion->delete();
            \Flash::add("Suggestion supprimée.","success");
        }else{
            \Flash::add("Suggestion impossible.","danger");
        }

        return redirect()->back();
    }
    
    public function test_create(Request $request){

        $user = UserAuth();

        $user = User::find($user->id);

        $data = [
            "user_author_id" => $user->id,
            "noteurs" => " ",
            "content" => "Contenu"
        ];

        Suggestion::create($data);
        
        #\Flash::add("Suggestion enregistré, mais pas encore notée","success");

    }
}