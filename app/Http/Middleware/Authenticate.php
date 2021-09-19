<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Request;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
      if(!$request->expectsJson()){
         if(Request::is('admin/*'))
           return route('loginAdmin');
         else
           return route('login');

      }


     /* if (Auth::guard('admin')->check()) {
            // The admin is logged in...
            return route('adminhome');
        }
      else if (Auth::guard('web')->check()) {
        
            return route('Shopper');
        }
      else{
            return url()->previous();
        } */
        

    }
}
