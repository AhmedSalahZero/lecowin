<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOnly
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

        if(Auth()->check() && Auth()->user()->rule_id===2 )
            return $next($request);
        elseif (Auth()->check() && Auth()->user()->rule_id ===1)
            return abort(404);
        else
            return redirect()->route('login.index',App()->getLocale());
    }
}
