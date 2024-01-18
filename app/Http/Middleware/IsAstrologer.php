<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAstrologer
{
    public function handle(Request $request, Closure $next)
    {
        if(strtolower(auth()->user()->type) == 'astrologer'){
            return $next($request);
        }
        return abort(403,'Access Denied');
    }
}
