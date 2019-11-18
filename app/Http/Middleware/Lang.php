<?php

namespace App\Http\Middleware;

use Closure;
use App;

class Lang
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
        if(session()->has('lang')){
            App::setLocale(session('lang'));
        }
        return $next($request);
    }
}
