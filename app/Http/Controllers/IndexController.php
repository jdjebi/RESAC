<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class IndexController extends Controller
{
    public function __construct()
    {
       $this->middleware('guest');
    }

    public function __invoke()
    {

      $user = null;

      if(\Auth::check()){
        $user =  \Users::auth();
      }

      return view('app.index');

    }

}

?>
