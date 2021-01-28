<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkBan
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
        if (auth()->check() && auth()->user()->status == "UnActive") {
            Auth::logout();
            $message = 'Your account has been suspended. Please contact administrator.';
            return redirect()->route('login')->with('error', $message);
        }

        return $next($request);
    }
}
