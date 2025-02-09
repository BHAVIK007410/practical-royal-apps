<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CheckAuth
 * 
 * @package App\Http\Middleware
 */
class CheckAuth
{
    /**
     * Method handle
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('logggedinuser_password')) {
            if (Route::currentRouteName() == 'login' || Route::currentRouteName() == 'do-login') {
                return redirect()->route('dashboard');
            }
        }
        
        if (!Session::has('logggedinuser_password')) {
            if (Route::currentRouteName() != 'login' && Route::currentRouteName() != 'do-login') {
                return redirect()->route('login');
            }
        }

        return $next($request);
    }
}
