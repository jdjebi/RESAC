<?php

namespace App\Http\Middleware;

use Closure;

class GuestOnly
{
    /* Redirige si l'utilisateur est connecté */

    public function handle($request, Closure $next)
    {
        if(\Auth::check()){
          return redirect()->route("profil");
        }

        return $next($request);
    }
}
