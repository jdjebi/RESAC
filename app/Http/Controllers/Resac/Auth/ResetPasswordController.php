<?php

namespace App\Http\Controllers\Resac\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function __invoke(){


      return view('auth.passwords.email',[
        'token' => '123'
      ]);

    }
}
