<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Features;


class IndexController extends Controller
{

    public function __invoke()
    {

      $user = null;

      if(\Auth::check()){
        $user =  \Users::auth();
      }

      $feature = Features::last();

      return view('app.index',[
        'feature' => $feature
      ]);

    }

}

?>
