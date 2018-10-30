<?php

namespace App\Http\Middleware;

use Anetwork\Database\Models\User;
use Closure;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AuthUserBeforeForTestingMiddleware
{
    use AuthorizesRequests;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string $access
     * @return mixed
     */
    public function handle($request, Closure $next, $access = 'general')
    {

        $authUser = $request->get('user_id');
        if (app()->environment('testing') && $authUser) {
            \Auth::loginUsingId($authUser);
        }

        return $next($request);
    }
}
