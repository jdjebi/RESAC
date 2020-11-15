<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Models\SearchUserIndex;
use App\RESAC\Defines;

class AuthController extends Controller
{

    public function logout(){
      \Resac\logout();
      return redirect()->route("home");
    }

    public function login(Request $request){
      $form = new \LoginForm($_POST);
      $success = false;
      $is_error = false;

      if($form->is_validate()){
        $email = $form->get("email");
        $password = $form->get("password");

        $user = \Resac\authenticate($email,$password);

        if($user){
          \Resac\login($request,$user);
          $success = true;
        }else{
          $form->add_error('global',"Adresse E-mail ou mot de passe incorrecte.");
        }
      }else{
        $form->add_error('global',"Veuillez remplir tous les champs.");
      }

      return json_encode([
        'is_error' => $form->is_errors(),
        'errors' => $form->get_errors(),
        'success' => $success
      ]);
    }

    public function admin_logout(){
      \Resac\logout();
      return redirect()->route("home");
    }

    public function register(){

      $form = new \RegisterForm($_POST);

      // Validation
      if($form->is_validate()){

        $data = $form->get_data();

        // Enregistrement
        $user = User::create([
          "nom" => $data["nom"],
          "prenom" => $data["prenom"],
          "email" => $data["email"],
          "password" => Hash::make($data["password"]),
          "version" => Defines::CURRENT_UPDATE_VERSION, // version actuelle des comptes
        ]);

        // L'utilisateur est nommé comme membre
        $user->assignRole("member");

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

        session()->put('form_export', $form->export_results());

        return redirect()->back();
      }
    }
}

?>
