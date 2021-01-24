<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class activedUser
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
        if($request->user()->isActivated())
        return $next($request);
        return redirect()->back()->with('fail',trans('lang.You have to active your account to see this page'));
    }
}
