<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Foundation\Auth\admin;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Session;

class UserLoggedInMiddleware
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


        return $next($request);
    }
}
