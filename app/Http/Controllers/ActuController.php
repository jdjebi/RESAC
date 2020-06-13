<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Resac\Auth2;
use App\Features;



class ActuController extends Controller
{

    protected $user;

    public function __construct(){
        $this->user = Auth2::user();
    }

    public function index(){

      $user = Auth2::user();

      // Publication de test
      if(isset($_POST['new_post_test'])){
        $content = "Lorem ipsum dolor sit amet.";
        \Post::create([
          "user" =>   $user->id,
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

      $last_feature = Features::last();

      $title =  "Actualités";

      dump($user->photo);

      dump(asset("asset/imgs/user_default_pic.png"));

      return view("app.actu",[
        'title' => $title,
        'user' => $user,
        'feed_posts' => $feed_posts,
        'last_feature' => $last_feature
      ]);
    }


    public function feed(Request $request){


      $feed_posts = \Post::all();

      // $last_feature = Features::last();

      $title =  "Actualités";

      return view("app.feed.page",[
        'title' => $title,
        'user' =>  $this->user,
      ]);

    }

}

?>
