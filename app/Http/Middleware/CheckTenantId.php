<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckTenantId
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

        if (!session()->has('tenant_id')) {
            return redirect()->route('tenant');
        }

        return $next($request);
    }
}
