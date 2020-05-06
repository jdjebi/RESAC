<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ActuController extends Controller
{

    public function index()
    {

      $user = \Users::auth();

      // Publication de test
      if(isset($_POST['new_post_test'])){
        $content = "Lorem ipsum dolor sit amet.";
        \Post::create([
          "user" => $user->id,
          "content" => $content
        ]);
      }

      // Nouvelle publication
      if(isset($_POST['new_post'])){
        if(isset($_POST['content'])){
          if(!empty($_POST['content'])){
            \Post::create([
              "user" => $user->id,
              "content" => $_POST['content']
            ]);
            \Redirect::back();
          }else{
            \Flash::add("Votre publication est vide.","warning");
          }
        }
      }

      // Supression d'une publication
      if(isset($_GET['delete']) && !empty($_GET['delete'])){

        $post = \Post::get($_GET['delete']);

        if($post){
          if($post->user_id == $user->id){
            \Flash::add("Publication supprimée.","success");
            $post->delete();
          }else{
            \Flash::add("Supression de la publication impossible.","danger");
          }
        }else{
          \Flash::add("Publication inexistante.","warning");
        }
        \Redirect::route('actu');
      }

      $feed_posts = \Post::all();

      $title =  "Actualités";

      return view("app.actu",[
        'title' => $title,
        'user' => $user,
        'feed_posts' => $feed_posts
      ]);
    }
}

?>
