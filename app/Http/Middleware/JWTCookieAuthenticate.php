<?php

namespace App\Http\Middleware;

use App\Helpers\StringUtil;
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
        $value = $request->cookie(StringUtil::$TOKEN_USER);
        if (!!$value) {
            $request->headers->set('Authorization', 'bearer ' . $value);
        }
        return $next($request);
    }
}
