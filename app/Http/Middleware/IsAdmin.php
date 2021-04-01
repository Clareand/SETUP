<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if(auth()->user()->id_role == 1){
            return $next($request);
        }else{
            return response()->json(['message'=>'Not Authenticated as Admin'],404);
        }
    }
}