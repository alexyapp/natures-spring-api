<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        foreach (func_get_args() as $key => $value) {
            if ($key === 0 || $key === 1) continue;

            if ($request->user()->hasRole($value))
                return $next($request);
        }

        return response()->json([
            'message' => 'Unauthorized',
            'status' => 401
        ], 401);
    }
}
