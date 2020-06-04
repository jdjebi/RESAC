<?php

namespace App\Http\Controllers\Resac\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function login(Request $request){
      $form = new \LoginForm($_POST);
      $success = false;
      $is_error = false;

      if($form->is_validate()){
        $email = $form->get("email");
        $password = $form->get("password");

        $user = \Resac\authenticate($email,$password);

        if($user){
          \Resac\login($user);
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

}
