<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        session_start();
        if(@$_SESSION['CURRENT_USER']){
            return $next($request);
        }else{
            return redirect(route('admin.login'))->withInput()->withErrors([
                "sonuc" => "Öncelikle giriş yapmalısın !"
            ]);
        }

    }
}
