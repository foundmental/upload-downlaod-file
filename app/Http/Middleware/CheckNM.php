<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Closure;

class CheckNM
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
        $email=$request->email;
        if ($request->name == ''||$request->email == '') {
            return redirect('/');
        }
        $DBemail = DB::table('users')->where('email', $email)->value('email');
        if($DBemail==$email){
            return "email is repeat";
        }
        return $next($request);
    }
    
}
