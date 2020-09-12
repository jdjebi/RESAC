<?php

namespace App\Http\Controllers\UI\Web\Compte;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompteController extends Controller
{
 
    public function photo(Request $request){

        $user = UserAuth(); 
  
        $edit_form = "photo";

        $title = "Compte - Photo";
  
        return view("app.params.edit",[
          'user' => $user,
          'title' => $title,
          'edit_form' => $edit_form,
        ]);
    }
 
    public function pass(Request $request){

        $user = UserAuth();
  
        $FormPass = new \Form\User\Update\Password($_POST);
  
        $title = "Compte - Mot de passe";
        $edit_form = "password";
  
        return view("app.params.edit",[
          'user' => $user,
          'title' => $title,
          'FormPass' => $FormPass,
          'edit_form' => $edit_form,
        ]);
    }

    public function general(Request $request){

      $user = UserAuth();

      $FormInfo = new \Form\User\Update\Info($_POST);

      $FormInfo->set_default([
        "nom" => $user->nom,
        "prenom" => $user->prenom,
        "email" => $user->email,
        "numero" => $user->numero,
        "pays" => $user->code_pays,
        "ville" => $user->ville,
        "commune" => $user->commune,
        "promo1" => $user->promo1,
        "promo2" => $user->promo2,
        "universite" => $user->universite,
        "emploi" => $user->emploi,
      ]);

      $FormInfo->register_array('pays',\Country::codes());

      if($request->has("change_info") && $FormInfo->is_validate()){
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

        $user_auth = \Users::auth2();

        SearchUserIndex::update_row($user_auth); // Mise à jour de la ligne d'index de l'utilisateur

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

      $countries_data = \Country::all();
      $json_countries = \Country::json();

      $title = "Compte - Général";
      $edit_form = "infos";

      return view("app.params.edit",[
        'user' => $user,
        'title' => $title,
        'FormInfo' => $FormInfo,
        'edit_form' => $edit_form,
        'countries_data' => $countries_data,
        'json_countries' => $json_countries
      ]);
    }

}

?>
