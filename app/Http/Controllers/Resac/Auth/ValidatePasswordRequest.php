<?php

namespace App\Http\Controllers\Resac\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;


class ValidatePasswordRequest extends Controller
{
  public function __invoke(Request $request)
  {

    $response = $this->sendResetEmail($request);

    if($response == 'passwords.throttled'){
      return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
    }else if($response == 'passwords.user'){
      return redirect()->back()->withErrors(['email' => 'Adresse E-mail non reconnue.']);
    }else if($response == 'passwords.sent'){
      \Flash::add('Consultez votre adresse E-mail, un lien de réinitialisation de mot de passe vous a été envoyé.','success');
      return redirect()->back();
    }

    die();

    return view('auth.passwords.reset',[
      'token' => '123'
    ]);
  }

  protected function sendResetEmail($request)
  {
    return  $this->broker()->sendResetLink(
        $this->credentials($request)
    );
  }

  protected function credentials(Request $request)
  {
      return $request->only('email');
  }

  private function broker()
  {
      return Password::broker();
  }

}
