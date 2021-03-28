<?php

namespace App\Http\Middleware\Resac\Admin;

use Closure;


class LoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $redirect_url = route("admin")."?redirect=". $request->path();

        if(!UserAuth()::is_staff_user()){
          \Flash::add("Vous devez être connecté pour avoir accès à cette page.","warning");
          return redirect($redirect_url);
        }
        return $next($request);
    }
}
