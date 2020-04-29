<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;


class PubsController extends Controller
{

    public function dashboard()
    {

      // Middleware

      $user = \Users::auth();

      return view("admin.pubs.dashboard",[
        "user" => $user
      ]);


    }

    public function api_get_all(){

      // Middleware

      $pubs = \Post::all();

      \Post::all2();

      return json_encode($pubs);
    }

}
