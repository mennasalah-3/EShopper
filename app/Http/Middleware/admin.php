<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class admin
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
        if (Auth::guard('admin')->check()) {
            // The admin is logged in...
            return $next($request);
        }
        else if (!Auth::guard('admin')->check()){
            return route('loginAdmin');
        }
        return route('Shopper');
    }
}
