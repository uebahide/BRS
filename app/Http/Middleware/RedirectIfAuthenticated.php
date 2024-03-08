<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    private const USER_GUARD = "users";
    private const LIBRARIAN_GUARD = "librarian";

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        if(Auth::guard(self::LIBRARIAN_GUARD)->check() && $request->routeis('librarian.*')){
            return redirect(RouteServiceProvider::LIBRARIAN_HOME);
        }
        if(Auth::guard(self::USER_GUARD)->check() && $request->routeis('user.*')){
            return redirect(RouteServiceProvider::USER_HOME);
        }
        
        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }
        return $next($request);
    }
}
