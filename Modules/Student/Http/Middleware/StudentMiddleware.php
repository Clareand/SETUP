<?php

namespace Modules\Student\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->id_role == 2){
            return $next($request);
        }else{
            return response()->json(['message'=>'Not Authenticated as Student'],404);
        }
    }
}
