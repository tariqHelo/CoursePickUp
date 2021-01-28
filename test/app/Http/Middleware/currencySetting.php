<?php

namespace App\Http\Middleware;

use Closure;

class currencySetting
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
        $currency = \Session::get('currency');
        define("GLOBAL_CURRENCY", $currency);
        return $next($request);
    }
}
