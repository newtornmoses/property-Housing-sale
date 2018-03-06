<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Carbon\carbon;
use Cache;
class OnlineStatus
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
       
        
        if (Auth::check() ) {
            $online_user = Auth::user()->id;
            $expires_at =Carbon::now()->addMinutes(5);
            Cache::put('user_is_online'.$online_user,  true, $expires_at);
            
           
        }
        
        return $next($request);
    }
}
