<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Owners
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param            $guar 
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
          if ($request->ajax()) {
            return response('Unauthorized.', 401);
          } else {
            return redirect()->guest('login');
          }
        } else if (!Auth::guard($guard)->user()->is_owner) {
          return redirect()->bacl()->withError('Only owners can perform that action');
        }

        return $next($request);
    }
}
