<?php

namespace App\Http\Middleware;

use App\Traits\permissionTraits;
use Closure;

use Illuminate\Http\Request;

class hasPermission
{
    use permissionTraits;
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $this->hasPermission();
        return $next($request);
    }
}
