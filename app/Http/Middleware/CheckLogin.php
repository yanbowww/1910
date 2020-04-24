<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        //dd(encrypt('123123'));
        // session(['adminuser'=>null]);
        // request()->session()->save();
        //判断用户是否登录
        $adminuser = session('adminuser');
        //dd($adminuser);
        if(!$adminuser){
           
            //从cookie内取用户信息，如果有则 并存入session
            $cookie_adminuser = request()->cookie('adminuser');
            
            if($cookie_adminuser){
                session(['adminuser'=>$cookie_adminuser]);
            }else{
                return redirect('/login');
            }
        }

        return $next($request);
    }
}
