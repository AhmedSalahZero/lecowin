<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class expiredAccount
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
        if(Auth()->check() && Auth()->user()->rule_id==2)
        {
            if (Auth()->user()->accountExpires())
            {
                Auth()->user()->code=null ;
                Auth()->user()->save();
            }
        }

        return $next($request);
    }
}
