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

        $user = UserAuth();

        if($user){
          if($user::is_staff_user()){
            return $next($request);
          }else{
            \Flash::add("Vous avez pas le droit d'accéder à cette pas","warning");
          }
        }else{
          \Flash::add("Vous devez être connecté pour avoir accès à cette page.","warning");
        }

        return redirect($redirect_url);
       
    }
}
