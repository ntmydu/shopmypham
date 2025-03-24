<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role_user === 'admin') {
            return $next($request);
        }
        if (Auth::check() && Auth::user()->role_user === 'saler') {
            return $next($request);
        }


        return redirect()->route('/login')->with('error', 'Bạn không được truy cập trang web này.');
    }
}