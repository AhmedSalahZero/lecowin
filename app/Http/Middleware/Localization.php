<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Localization
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
        if (! in_array(request()->segment(1), ['en', 'ar'])) {

            $request->route()->forgetParameter('lang');
            return redirect()->to('/en');
        }

        if ($request->lang <> '') {
            app()->setLocale($request->lang);
        } else {
            app()->setLocale('en');
            $request->route()->forgetParameter('lang');
            return redirect()->to('/en');
        }
        $request->route()->forgetParameter('lang');
        return $next($request);
    }
}
