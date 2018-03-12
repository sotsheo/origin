<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Checkadmin
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
         if($request->is('admin/login') && Auth::check()){
            return redirect("admin/login");
        }
        if(!$request->is('admin/login') && !Auth::check()){
            return redirect("admin/login");
        }
        

        return $next($request);
    }
}
