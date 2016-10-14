<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAuthenticatedAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
      if (!Auth::guard($guard)->check()) {
        $msgs = array("type" => "alert alert-danger",
          "msg" => "First Login");
           return redirect()->route('admin-login')->with("msg", $msgs); // <--- note this
         }

         return $next($request);
       }
     }
