<?php

namespace App\Http\Middleware;

use Closure;

class CorsControl
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
        $host = env('CORS_ALLOW_HOST', '*');
        header("Access-Control-Allow-Origin : $host");
        header('Access-Control-Allow-Headers : Content-type, X-Auth-Token, Authorization, Origin');
        return $next($request);
    }
}
