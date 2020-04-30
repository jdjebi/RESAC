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


    public function pub($id){

      // Middleware

      // 404 publication introuvable

      $user = \Users::auth();

      $post = \Post::get($id);

      if(!$post){
        return view("admin.pubs.404",[
          "user" => $user,
        ]);
      }

      return view('admin.pubs.pub',[
        "user" => $user,
        "post" => $post
      ]);

    }


    public function api_get_all(){
      // Middleware
      $pubs =  \Post::all2();
      return json_encode($pubs);
    }

}
