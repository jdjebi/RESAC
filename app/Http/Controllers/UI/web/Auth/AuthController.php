<?php

namespace App\Http\Controllers\UI\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\SearchUserIndex;
use App\User;


class AuthController extends Controller
{

    public function login(Request $request){

      $title2 = "Connexion";
      $redirect_url = $request->has('redirect') ? $request->redirect : "";

      return view('app.auth.connexion',[
        "redirect_url" => $redirect_url,
        "title2" => $title2
      ]);
    }

    public function register(){

      $form = new \RegisterForm($_POST);

      $errors = null;

      // Récupération des erreurs issues du traitement Backend
      if(session("form_export")){
        $form->import_data(session("form_export"));
        session()->put("form_export",null);
        $errors = $form->get_errors();
      }

      $title2 = "Créer un Compte";

      return view('app.auth.inscription',[
        "form" => $form,
        "title2" => $title2,
        "errors" => $errors
      ]);

    }
}

?>
