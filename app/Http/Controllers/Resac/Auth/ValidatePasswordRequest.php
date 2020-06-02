<?php

namespace App\Http\Controllers\Resac\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ValidatePasswordRequest extends Controller
{
  public function __invoke(Request $request){

    $user = DB::table('users')->where('email', '=', $request->email)->first();

    dump($user);

    if ($user == null) {
        return redirect()->back()->withErrors(['email' => 'Adresse E-mail non reconnue.']);
    }


    return view('auth.passwords.reset',[
      'token' => '123'
    ]);
  }
}
