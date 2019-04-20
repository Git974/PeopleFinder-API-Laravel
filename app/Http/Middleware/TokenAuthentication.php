<?php

namespace App\Http\Middleware;

use Closure;

class TokenAuthentication
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
        $token = $request->header('X-API-Key');
        if('QAZ789WSX456EDC123RFV' != $token){
            abort(401, 'You are not authorized!');
        }
        return $next($request);
    }
}
