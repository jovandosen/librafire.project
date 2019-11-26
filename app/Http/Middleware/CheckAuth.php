<?php

namespace LibraFireProject\Http\Middleware;

use Closure;

class CheckAuth
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
        if( !session()->has('user') ){
            return redirect()->route('login');
        }

        return $next($request);
    }
}
