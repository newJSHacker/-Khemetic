<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (auth()->user() &&  auth()->user()->isAdmin()) {
            return $next($request);
        }

        if(auth()->check()) {
            return redirect(route('home-user'));
        }else {
            return redirect('login');
        }
    }
}
