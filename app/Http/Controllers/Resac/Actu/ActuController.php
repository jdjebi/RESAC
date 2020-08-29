<?php

namespace App\Http\Controllers\Resac\Actu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Features;
use App\Resac\Core\Posts\PostRenderer;

class ActuController extends Controller
{

    public function index(){

      $user = UserAuth();

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