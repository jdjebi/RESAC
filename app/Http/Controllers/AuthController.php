<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\SearchUserIndex;
use App\User;



class AuthController extends Controller
{

    /* Déconnexion */
    public function logout(){
      \Resac\logout();
      return redirect()->route("home");
    }


    /* Connexion */
    public function login(Request $request){

      $title2 = "Connexion";

      $redirect_url = $request->has('redirect') ? $request->redirect : "";

      /*
      if (\Illuminate\Support\Facades\Auth::check()) {
        dump("Utilisateur connecté");
      }else{
        dump("Utilisateur non-connecté");
      }
      */

      return view('app.connexion',[
        "redirect_url" => $redirect_url,
        "title2" => $title2
      ]);
    }


    /* Inscription  */
    public function register(){

      $form = new \RegisterForm($_POST);

      $errors = null;

      if($_POST){

        // Validation
        if($form->is_validate()){

          $data = $form->get_data();

          // Enregistrement
          $user = User::create([
            "nom" => $data["nom"],
            "prenom" => $data["prenom"],
            "email" => $data["email"],
            "password" => Hash::make($data["password"]),
            "version" => 2, // version actuelle des comptes
          ]);

          // L'utilisateur est enregistré dans l'index de recherche
          SearchUserIndex::register($user);

          // Notification
          \Flash::add("Inscription réussie. Vous pouvez vous connecter.","success");

          // Redirection
          return redirect()->route('home');
        }else{

          if($form->isset('emails','email')){
            $form->add_error('email',"Le format de l'adresse E-mail est incorrecte.");
          }else if($form->isset('uniques','email')){
            $form->add_error('email',"Adresse E-mail déjà utilisée.");
          }

          if($form->isset('equals','password')){
            $form->add_error('password',"Les mots de passe sont différents.");
          }

          $errors = $form->get_errors();
        }

        // dump($form->get_errors());
        // dump($form->get_data());

      }

      $title2 = "Créer un Compte";

      return view('app.inscription',[
        "form" => $form,
        "title2" => $title2,
        "errors" => $errors
      ]);

    }
}

?>
