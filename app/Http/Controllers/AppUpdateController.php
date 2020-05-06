<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class AppUpdateController extends Controller
{

    public function __invoke()
    {
        $user = null;

        if(\Auth::check()){
          $user = \Users::auth();
        }

        return view('app.news.timeline',[
          'user' => $user
        ]);
    }
}

?>
