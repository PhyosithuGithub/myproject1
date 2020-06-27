<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Manager
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
        if(Auth::check()){
            $user =Auth::user();
            if($user->hasRole("Admin")){
                return $next($request);
            }else{
                return redirect('/');
            }
        }else{
           return redirect('/');
        }
        return $next($request);
    }
}
