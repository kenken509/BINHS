<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class VerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $verifiedUser = Auth::user()->email_verified_at;
        
         

        if($verifiedUser){
            return $next($request); // allow user
        }else{
            return redirect('/verify-email');
        }
        
        
    }
}
