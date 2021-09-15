<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BasicTokenAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->header('token') !== config('auth.api_token')){
            abort(403, 'Mauvais token');
        }

        return $next($request);
    }
}
