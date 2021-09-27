<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Super {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed {
        if($request->user()->is_admin === 7 || ($request->user()->admin && $request->user()->admin->type === 'Admin'))
            return $next($request);

        return accessDenied();
    }
}
