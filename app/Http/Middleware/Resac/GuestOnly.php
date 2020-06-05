<?php

namespace App\Http\Middleware\Resac;;

use Closure;
use Illuminate\Support\Facades\Auth;

class GuestOnly
{
    /* Redirige si l'utilisateur est connecté */

    public function handle($request, Closure $next)
    {

        #die('test');

        if(Auth::check()){
          return redirect()->route("profil");
        }

        return $next($request);
    }
}
