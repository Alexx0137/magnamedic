<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Modules\Users\Models\User;

class ShareAuthUser
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            view()->share('authUser', User::find(Auth::id())->load('role'));
        } else {
            view()->share('authUser', null);
        }

        return $next($request);
    }
}
