<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Features;

class FeaturesController extends Controller
{
    public function dashboard(){

      $features = Features::all();

      $user = \Users::auth();

      return view("admin.features.dashboard",[
        'title' => 'Espace Nouveautés',
        'user' => $user,
        'features' => $features
      ]);

    }

    public function feature($id){
      /* D'une nouveauté */

      $feature = Features::findOrFail($id);

      $user = \Users::auth();

      $title = "Nouveautés - ".$feature->title;

      $is_author = $feature->user_author_id == $user->id;

      return view("admin.features.feature",[
        'title' => $title,
        'user' => $user,
        'feature' => $feature,
        'is_author' => $is_author
      ]);

    }

    public function create(){

      $user = \Users::auth();

      return view('admin.features.create',[
        'title' => 'Créer un nouveauté',
        'user' => $user
      ]);

    }

    public function store(Request $request){
      /* Création d'une nouveauté */

      // Validation

      $feature = new Features;

      $feature->title = $request->title;
      $feature->content = $request->content;
      $feature->user_author_id = $request->user_author_id;

      if($request->created_at)
        $feature->created_at = $request->created_at;

      $feature->save();

      \Flash::add("Nouveautés enregistrées.","success");

      return redirect()->route('admin.feature.all');

    }

    public function update($id, Request $request){
      /* Mise à jour d'une nouveauté */

      // Validation

      $feature = Features::findOrFail($id);

      $user = \Users::auth();

      if($user->id == $feature->user_author_id){
        \Flash::add("Vous n'avez pas le droit de modifier cette nouveauté.","warning");
        return redirect()->route("admin.feature.show",$id);
      }

      $feature->title = $request->title;
      $feature->content = $request->content;

      if($request->created_at)
        $feature->created_at = $request->created_at;

      $feature->save();

      \Flash::add("Modification enregistrées.","success");

      return redirect()->route("admin.feature.show",$id);

    }

    public function delete($id,Request $request){

      $feature = Features::findOrFail($id);
      $feature->delete();

      \Flash::add("Nouveautés supprimée.","success");

      return redirect()->route('admin.feature.all');
    }
}
