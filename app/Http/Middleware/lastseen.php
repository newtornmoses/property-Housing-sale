<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Cache;
use Carbon\carbon;
class lastseen
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
        if (!Auth::Check() ) {
            return $next($request);
        }

        if (Auth::Check() ) {
            $key = 'lastseen'.Auth::id();
            $time = Carbon::now();
            Cache::put($key, true, $time);
            return $next($request);
        }
    }
}
