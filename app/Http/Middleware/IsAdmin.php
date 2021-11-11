<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
//use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        
        if (Auth::check()){
            if(Auth::user()->id != 1){
                //$request->id;
                //return redirect('home');
                return redirect('dashboard');
            }
            return $next($request);
        }
        else{
            return redirect('/');
        }
    }
}
