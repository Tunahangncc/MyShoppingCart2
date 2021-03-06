<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->type == 'customer')
            {
                return redirect()->route('customerHome');
            }
            else if(Auth::user()->type == 'admin')
            {
                return redirect()->route('adminDashboard');
            }
        }

        return $next($request);
    }
}
