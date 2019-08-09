<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin
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
        //ここで0はadminuserではないが、１ならadminuserということに設定している
        if(!Auth::user()->admin){
            Session::flash('info','You dont have permission to perform this aciton');
            return redirect()->back();
        }
        return $next($request);
    }
}
