<?php

namespace App\Http\Middleware;

use Closure;

class APIResponseHeaderMiddleware
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
        header_remove('Access-Control-Allow-Credentials');
        header_remove('Access-Control-Allow-Origin');
        return $next($request);
    }
}
