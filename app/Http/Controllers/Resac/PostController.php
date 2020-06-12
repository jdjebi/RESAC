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

    public function index(){

      $user = Auth2::user();

      $title2 = 'Publications';

      $posts = Post::all();

      # dump($posts);

      return view('app.publications.index',[
        'title2' => $title2,
        'user' => $user
      ]);

    }
}
