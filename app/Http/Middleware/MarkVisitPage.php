<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MarkVisitPage
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
        if($request->user()->hasVisitedThisPage(Request()->segment(2)))
        {
            return $next($request);
        }
        $request->user()->markPageAsVisited();
        return $next($request);
    }
}
