<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
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

        $webRouteName = $request->route()->getName();
        $MyAuths = json_decode(getCurrentUser()->auth->auths);

        $getMenuID = findRouteNameMenu($webRouteName);

        if(in_array("menu_".$getMenuID,$MyAuths)){
            return $next($request);
        }else{
            return redirect(route("admin.login"));
        }

    }
}
