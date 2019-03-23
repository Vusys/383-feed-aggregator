<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceJson
{
    /**
     * Handle an incoming request.
     *
     * https://twitter.com/TheAlexLichter/status/969879256271597568
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');
        return $next($request);
    }
}
