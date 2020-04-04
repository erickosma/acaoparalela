<?php

namespace App\Http\Middleware;

use Closure;

class JWTCookieAuthenticate
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
        //remove this
        $value = $request->cookie('token_user');
        if (!!$value) {
            $request->headers->set('Authorization', 'Bearer ' . $value);
        }
        return $next($request);
    }
}
