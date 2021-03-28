<?php

namespace App\Http\Controllers\UI\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function __invoke(){

      $title = 'Mot de passe oublié';

      return view('app.auth.passwords.email',[
        'title2' => $title
      ]);

    }
}
