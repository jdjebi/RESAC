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

      $posts = Post::where('user',$user->id)->orderBy('date','desc')->get();


      return view('app.publications.index',[
        'title' => $title,
        'user' => $user,
        'posts' => $posts,
        'request' => $request,
      ]);

    }

    public function create(Request $request){

      $user = Auth2::user();

      $title = 'Publications - Créer';

      return view('app.publications.create',[
        'title' => $title,
        'user' => $user,
        'request' => $request,

      ]);

    }
}
