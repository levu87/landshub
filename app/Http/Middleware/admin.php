<?php

namespace App\Http\Middleware;

use Closure,Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
        if(Auth::check() && Auth::User()->role==0){
            return $next($request);
        }
        return redirect()->route('login')->with('error',"Bạn không có quyền truy cập");
    }
}
