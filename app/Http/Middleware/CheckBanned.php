<?php

namespace UKMVRS\Http\Middleware;

use Closure;

class CheckBanned
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

        if (auth()->check() && auth()->user()->status == "Blocked") {
            auth()->logout();
            $message = 'Your account has been suspended. Please contact the admin at ukmvrs@gmail.com';
            return redirect()->route('login')->withMessage($message);
        }
        return $next($request);
    }
}
