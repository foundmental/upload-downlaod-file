<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //  if (Auth::guard($guard)->check()) {
            //  return redirect('/');
            //  var_dump(Auth::guard($guard)->check());
            // var_dump('the user is logged in');
     //   }
        
        return $next($request);
    }
}
