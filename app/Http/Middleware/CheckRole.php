<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {


        if ($role == 'admin' && auth()->user()->Admin != 1) {
            abort(403);
        }

        if ($role == 'profe' && auth()->user()->Admin != 0) {
            abort(403);
        }

        return $next($request);
    }
}