<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class IndexController extends Controller
{

    public function index()
    {
      require  __DIR__."/../../../middleware/guest.php";

      $user = null;

      if(\Auth::check()){
        $user =  \Users::auth();
      }

      return view('app.index',[
        "user" => $user,
      ]);

    }

}

?>
