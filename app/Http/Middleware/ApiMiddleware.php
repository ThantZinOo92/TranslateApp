<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * middleware for api request
 */
class ApiMiddleware
{
    /**
     * customise header for api request
     * @param Request $request
     * @param Closure $next
     * @return Closure
     */
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', '*/*');
        $request->headers->set('Content-Type', '*/*');

        return $next($request);
    }
}
