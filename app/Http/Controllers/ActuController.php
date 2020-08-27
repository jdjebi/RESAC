<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Resac\Auth2;
use App\Features;
use App\User;
use App\Resac\Core\Posts\PostRenderer;

class ActuController extends Controller
{

    protected $user;

    public function __construct(){
        $this->user = Auth2::user();
    }

    public function index(){

      $user = Auth2::user();

      $user = User::find($user->id);

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


      $feed_posts = \App\Models\Post::select("*")->orderBy('date', 'desc')->get();

      $last_feature = Features::last();

      $title =  "Actualités";

      $feed_posts = PostRenderer::render_posts($feed_posts);

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
