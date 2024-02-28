<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $currentPath = request()->path();
        error_log($currentPath);
        if (Auth::check()) {
            return $next($request);
        }
        if ($currentPath == "login" && !Auth::check()) {
            return $next($request);
        }
        if (Auth::check() && $currentPath == "login") {
            return redirect('myalbum');
        }

        return redirect('login');
    }

}
