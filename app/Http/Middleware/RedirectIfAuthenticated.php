<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        if (Auth::guard($guards)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        if (Auth::guard('admin')->check()) {
            return redirect(RouteServiceProvider::ADMIN_HOME);
        }
        return $next($request);
    }
}
