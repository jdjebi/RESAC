<?php

namespace App\Http\Controllers\Resac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Resac\Auth2;

class PostController extends Controller
{

    protected $user;

    public function __construct(){

    }

    public function index(){

      $user = Auth2::user();

      return view('app.publications.index',[
        'user' => $user
      ]);

    }
}
