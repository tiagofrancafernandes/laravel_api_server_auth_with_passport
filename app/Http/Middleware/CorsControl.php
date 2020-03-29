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
        $hosts = explode(";", env('CORS_ALLOW_HOSTS'));
        foreach($hosts as $h)
        {
            if(strlen($h) > 5)
            header("Access-Control-Allow-Origin : $h");
        }
        // header('Access-Control-Allow-Origin : *');
        // header('Access-Control-Allow-Origin : *');
        header('Access-Control-Allow-Headers : Content-type, X-Auth-Token, Authorization, Origin');
        return $next($request);
    }
}
