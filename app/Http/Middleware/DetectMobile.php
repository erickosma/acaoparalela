<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use Jenssegers\Agent\Agent;

class DetectMobile
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
        $agent = new Agent();
        View::share('isMobile', $agent->isMobile());
        return $next($request);
    }
}
