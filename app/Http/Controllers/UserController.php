<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{

    public function profil(){

      $user = \Users::auth();
      $user_visited = null;
      $show_portofolio = false;

      $title =  $user->nom.' '.$user->prenom;

      if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];
        $user_visited = \Users::get($id);
        if(!$user_visited){
          \Flash::add("Utilisateur introuvable","danger");
          return redirect()->route('explorer');
        }
        $show_portofolio = true;
        $title =  $user_visited->nom.' '.$user_visited->prenom;
      }

      return view('app.profil.index',[
        'title' => $title,
        'user' => $user,
        'user_visited' => $user_visited,
        'show_portofolio' => $show_portofolio
      ]);
    }

    public function account(){

      $user = \Users::auth();

      $FormInfo = new \Form\User\Update\Info($_POST);
      $FormPass = new \Form\User\Update\Password($_POST);

      $FormInfo->set_default([
        "nom" => $user->nom,
        "prenom" => $user->prenom,
        "email" => $user->email,
        "numero" => $user->numero,
        "pays" => $user->pays,
        "ville" => $user->ville,
        "commune" => $user->commune,
        "promo1" => $user->promo1,
        "promo2" => $user->promo2,
        "universite" => $user->universite,
        "emploi" => $user->emploi,
      ]);

      $FormInfo->register_array('pays',\Country::codes());

      if(isset($_POST["change_info"])){
        if($FormInfo->is_validate()){
          $data = $FormInfo->get_data();
          $user->nom = $data["nom"];
          $user->prenom = $data["prenom"];
          $user->email = $data["email"];
          $user->numero = $data["numero"];
          $user->pays = $data["pays"];
          $user->ville = $data["ville"];
          $user->commune = $data["commune"];
          $user->promo1 = $data["promo1"];
          $user->promo2 = $data["promo2"];
          $user->emploi = $data["emploi"];
          $user->universite = $data["universite"];
          $user->save();
          \Flash::add("Modifications enregisrées.","success");
          return redirect()->route('param');
        }else{
          $empty_field_message = "Veuillez remplir ce champs.";
          $email_format_error = "Format de l'adresse E-mail incorrecte.";
          $phone_format_error = "Format du numéro incorrecte.";
          $promo_required_error = "Veuillez renseigner les deux années.";
          $year_type_error = "Veuillez renseigner une année correcte.";
          $year_interval_error = "L'année doit être comprise entre 1945 et 2021.";
          $email_repeat_error = "Adresse E-mail déjà utilisée.";
          $phone_repeat_error = "Numéro de téléphone déjà utilisé.";
          $pays_error = "Veuiller renseigner un pays valide.";

          if($FormInfo->isset('required2','nom')){
            $FormInfo->add_error('nom',$empty_field_message);
          }

          if($FormInfo->isset('required2','prenom')){
            $FormInfo->add_error('prenom',$empty_field_message);
          }

          if($FormInfo->isset('required2','email')){
            $FormInfo->add_error('email',$empty_field_message);
          }else if($FormInfo->isset('emails','email')){
            $FormInfo->add_error('email',$email_format_error);
          }else if($FormInfo->isset('repeat','email')){
            $FormInfo->add_error('email',$email_repeat_error);
          }

          if($FormInfo->isset('phone','numero')){
            $FormInfo->add_error('numero',$phone_format_error);
          }else if($FormInfo->isset('repeat','numero')){
            $FormInfo->add_error('numero',$phone_repeat_error);
          }

          if($FormInfo->isset('double_required','promo')){
            $FormInfo->add_error('promo',$promo_required_error);
          }

          if($FormInfo->isset('integer','promo1')){
             $FormInfo->add_error('promo1',$year_type_error);
          } else if($FormInfo->isset('interval','promo1.interval')){
              $FormInfo->add_error('promo1.interval',$year_interval_error);
          }

          if($FormInfo->isset('integer','promo2')){
            $FormInfo->add_error('promo2',$year_type_error);
          } else if($FormInfo->isset('interval','promo2.interval')){
            $FormInfo->add_error('promo2.interval',$year_interval_error);
          }

          if($FormInfo->isset('selects','pays')){
            $FormInfo->add_error('pays',$pays_error);
          }

        }
      }elseif(isset($_POST["change_pass"]) && $FormPass->is_validate()) {
        $data = $FormPass->get_data();
        $password = crypt_password($data["pass"]);
        if($user->password == $password){
          if($data['nw_pass'] == $data['conf_pass']){
            $user->password = crypt_password($data['nw_pass']);
            $user->save();
            \Flash::add("Mot de passe mis à jour.","success");
          }else{
            $FormPass->add_error('global',"Les mots de passe sont différents.");
          }
        }else{
          $FormPass->add_error('global',"Mot de passe du compte incorrecte.");
        }
      }

      // dump($_POST);
      // dump($FormInfo->errors);

      if(isset($_GET['infos']))
        $edit_form = "infos";
      else if(isset($_GET['password']))
        $edit_form = "password";
      else if(isset($_GET['privacy']))
        $edit_form = "privacy";
      else
        $edit_form = "infos";

      $countries_data = \Country::all();
      $json_countries = \Country::json();

      $title = "Paramètres";

      return view("app.params.edit",[
        'user' => $user,
        'title' => $title,
        'FormInfo' => $FormInfo,
        'FormPass' => $FormPass,
        'edit_form' => $edit_form,
        'countries_data' => $countries_data,
        'json_countries' => $json_countries
      ]);
    }
}

?>
