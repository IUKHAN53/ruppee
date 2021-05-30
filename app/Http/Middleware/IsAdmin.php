<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if(auth()->user() && !auth()->user()->is_admin){
            abort(403);
        }
        return $next($request);
    }
}
