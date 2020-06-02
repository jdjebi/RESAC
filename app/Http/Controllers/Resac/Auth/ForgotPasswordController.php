<?php

namespace App\Http\Controllers\Resac\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function __invoke(){

      $title = 'Mot de passe oublié';

      return view('auth.passwords.email',[
        'title2' => $title
      ]);

    }
}
