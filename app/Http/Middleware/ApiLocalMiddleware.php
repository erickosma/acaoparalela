<?php

namespace App\Http\Middleware;

use Closure;

class ApiLocalMiddleware
{

    protected $whitelist = [
        '127.0.0.1',
        '::1'
    ];


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!in_array($_SERVER['REMOTE_ADDR'], $this->whitelist)) {
            return response()->json(['error' => 'Not authorized.'],403);
        }
        return $next($request);
    }
}
