<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
            {
                if (!auth()->check() || !auth()->user()->hasAnyRole($roles)) {
                    return redirect('/'); // Redirect unauthorized users to the home page or a different route
                }
                
                return $next($request);
            }
}
