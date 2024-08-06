<?php
//
//namespace App\Http\Middleware;
//
//use Closure;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\View;
//
//class ShareAuthenticatedUser
//{
//    /**
//     * Handle an incoming request.
//     *
//     * @param Request $request
//     * @param Closure $next
//     * @return mixed
//     */
//    public function handle(Request $request, Closure $next): mixed
//    {
//        if (Auth::check()) {
//            View::share('user', Auth::user());
//        }
//
//        return $next($request);
//    }
//}
