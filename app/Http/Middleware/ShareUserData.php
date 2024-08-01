<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ShareUserData
{
    public function handle($request, Closure $next)
    {
        view()->composer('*', function ($view) {
            $view->with('user', Auth::user());
        });

        return $next($request);
    }
}
