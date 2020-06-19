<?php

namespace App\Http\Controllers\Resac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Resac\Auth2;
use App\Models\Post;

class PostController extends Controller
{

    protected $user;

    public function __construct(){

    }

    public function index(Request $request){

      $user = Auth2::user();

      $title = 'Publications';

      if($request->has('certified')){
        $posts = Post::where('user',$user->id)->where('validate',true)->orderBy('date','desc')->get();
      }else if ($request->has('not-certified')){
        $posts = Post::where('user',$user->id)->where('validate',false)->orderBy('date','desc')->get();
      }else{
        $posts = Post::where('user',$user->id)->orderBy('date','desc')->get();
      }

      $count_posts = $user->count_posts();
      $count_certified_posts = $user->count_certified_posts();
      $count_not_certified_posts = $user->count_not_certified_posts();


      return view('app.publications.index',[
        'title' => $title,
        'user' => $user,
        'posts' => $posts,
        'request' => $request,
        'count_posts' => $count_posts,
        'count_certified_posts' => $count_certified_posts,
        'count_not_certified_posts' => $count_not_certified_posts
      ]);

    }

    public function create(Request $request){

      $user = Auth2::user();

      $title = 'Publications - Créer';

      $count_posts = $user->count_posts();
      $count_certified_posts = $user->count_certified_posts();
      $count_not_certified_posts = $user->count_not_certified_posts();

      return view('app.publications.create',[
        'title' => $title,
        'user' => $user,
        'request' => $request,
        'count_posts' => $count_posts,
        'count_certified_posts' => $count_certified_posts,
        'count_not_certified_posts' => $count_not_certified_posts

      ]);

    }

    public function create_free_post(Request $request){

      $user = Auth2::user();

      $title = 'Publication - Libre';

      if($request->isMethod('post')){

        if($request->filled('content')){
          \Post::create([
            "user" => $user->id,
            "content" => $_POST['content']
          ]);

          \Flash::add("Publication enregistré. En attente de certification.","success");

          return redirect()->route('app.post.not_certified');

        }else{
          \Flash::add("Votre publication est vide.","warning");
        }
      }

      $count_posts = $user->count_posts();
      $count_certified_posts = $user->count_certified_posts();
      $count_not_certified_posts = $user->count_not_certified_posts();

      return view('app.publications.creator.free_post', [
        'title' => $title,
        'user' => $user,
        'request' => $request,
        'count_posts' => $count_posts,
        'count_certified_posts' => $count_certified_posts,
        'count_not_certified_posts' => $count_not_certified_posts
      ]);
    }
}
