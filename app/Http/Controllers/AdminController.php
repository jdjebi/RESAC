<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function logout(){
      \Resac\logout();
      return redirect()->route("admin");
    }

    public function login(){

      $title2 = "Connexion";

      return view('admin.login',[
        "title2" => $title2
      ]);

    }

    public function index(){

      $user = \Users::auth();

      $title2 = "Gestion des utilisateurs";

      return view("admin.index",[
        "user" => $user,
        "title2" => $title2
      ]);
    }

    public function user_manager(){

      $user = \Users::auth();

      $title = "Gestion des utilisateurs";

      return view("admin.manager_user",[
        "user" => $user,
        "title" => $title
      ]);
    }

    public function user_profil($user_id){

      $user = \Users::auth();
      $user_visited = \Users::get($user_id);

      if(!$user_visited){
        return view('admin.user.profil_404',[
          "user" => $user,
          "title" => "Utilisateur introuvable"
        ]);
      }else{

        $form = new \UserAdminSettingsForm($_POST);

        $form->set_default([
          "role" => $user_visited->staff_role
        ]);

        $form->register_array('role',['admin','member']);

        if($form->is_validate()){
          $data = $form->get_data();

          if($data['role'] == "admin"){
            $user_visited->is_staff = 1;
          }else{
            $user_visited->is_staff = 0;
          }

          $user_visited->staff_role = $data['role'];
          $user_visited->save();

          \Flash::add("Paramètres de l'utilisateur mis à jour.","success");
        }else{
          if(isset($form->errors['required'])){
            \Flash::add("Veuiller renseigner tous les champs.","danger");
          }

          if($form->isset('selects','role')){
            \Flash::add("Veuiller renseigner un rôle valide.","danger");
          }
        }

        $title =  $user_visited->nom.' '.$user_visited->prenom;

        return view('admin.user.profil',[
          "form" => $form,
          "title" => $title,
          "user" => $user,
          'user_visited' => $user_visited
        ]);
      }

    }

    public function delete_user(){

      if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $user = \Users::get($id);
        if($user){
          $user->delete();
          \Flash::add('Utilisateur supprimé.','success');
        }else{
          \Flash::add('Utilisateur introuvable.','danger');
        }
      }else{
        \Flash::add("Désolé une erreur c'est produite.",'danger');
      }

      if(isset($_GET['redirect'])){
        $redirect = $_GET['redirect'];
        return redirect($redirect);
      }

      return redirect()->back();
    }

    public function api_login(Request $request){

      // guest middleware

      if(\Auth::is_admin_logged()){
        return "";
      }

      $form = new \LoginForm($_POST);
      $success = false;

      if($form->is_validate()){
        $email = $form->get("email");
        $password = $form->get("password");

        $user = \Resac\authenticate($email,$password);

        if($user){
          if($user->is_staff){
            $success = true;
             \Resac\login($request,$user);
          }else{
            $form->add_error('global',"Connexion impossible.");
          }
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

    public function api_get_user_list(){

      // Clé de sécurité

      $user = \Users::auth();

      $users = \Users::all_min();

      return json_encode($users);
    }

}

?>
