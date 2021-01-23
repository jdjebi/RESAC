<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Resac\Auth2;
use App\Models\Suggestion;

use function PHPSTORM_META\type;

class SuggestionController extends Controller {

    protected $user;

    public function __construct(){

    }

    public function index(Request $request)
    {
        $user = Auth2::user();
        $user = User::find($user->id);
        if ($request->isMethod('get')) {

            if ($request->is('suggestions')) {
                $suggestions = Suggestion::where('user_author_id',$user->id)->orderBy('date','desc')->get();
                return view('app.suggestions.index', ['user'=> $user, 'request'=>$request, 'suggestions'=>$suggestions]);
            }

            if ($request->is('suggestions/notées')){
                $suggestions = Suggestion::where('user_author_id',$user->id)->where('note', '>',0)->orderBy('date','desc')->get();
                return view('app.suggestions.index', ['user'=> $user, 'request'=>$request, 'suggestions'=>$suggestions]);
            }

            if ($request->is('suggestions/non-notées')){
                $suggestions = Suggestion::where('user_author_id',$user->id)->where('note',0)->orderBy('date','desc')->get();
                return view('app.suggestions.index', ['user'=> $user, 'request'=>$request, 'suggestions'=>$suggestions]);
            }
            if ($request->is('suggestions/liste')) {
                $suggestions = Suggestion::where('user_author_id','!=',$user->id)->get();
                $data = ['user'=> $user, 'request'=>$request, 'suggestions'=>$suggestions];
                foreach ($suggestions as $suggestion) {
                    $test = explode(';', $suggestion->noteurs);
                    $id = strval($suggestion->id);
                    $data['id'][$id]=$test;
                }
                //dd($data);
                return view('app.suggestions.index', $data);

            }
            
        }
    }

    public function create_suggestion(Request $request)
    {
        $user = Auth2::user();
        $user = User::find($user->id);
        if ($request->isMethod('post')) {
            //dd($user);
            Suggestion::create([
                "user_author_id" => $user->id,
                "noteurs" => " ",
                "content" => $_POST['content']
              ]);
        
            \Flash::add("Suggestion enregistré, mais pas encore notée","success");

            return redirect()->route('app.suggestion.no_noted');
            
        } else {
            return view('app.suggestions.creation', ['user'=> $user, 'request'=>$request]);
        }
    }
    public function note_suggestion(Request $request, $id)
    {
        $user = Auth2::user();
        $user = User::find($user->id);
        //dd($user->id);
        $tmp_note = Suggestion::where('id', $id)->get('note', 'noteurs');
        //dd($tmp_note);
        $note = $request->input('note');
        if ($tmp_note[0]['note'] != 0) {
            $note = intdiv($tmp_note[0]['note'] + $note, 2);
        }
        //dd($tmp_note[0]['noteurs']);
        $noteur = $user->id;
        if ($tmp_note[0]['noteurs'] != NULL) {
            $noteur = $tmp_note[0]['noteurs'] + ";" + $noteur;
        }
        //dd($noteur);
        
        if (Suggestion::where('id', $id)->update(['note' => $note, 'noteurs' => $noteur])){

            \Flash::add("Note enregistré","success");

            return redirect()->route('app.suggestion.list');

        }
        else {
            return redirect()->route('app.suggestion');
        }
            
    }

    public function suggestions_counter($user){
        return [
          'suggestions' => $user->count_suggestions,
          'suggestions_certified' => $user->count_suggestions,
          'suggestions_not_certified' => $user->count_not_certified_suggestions
        ];
      }
}