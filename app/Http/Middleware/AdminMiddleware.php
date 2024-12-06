<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if(auth()->check()) {
            // Check if the user's role is 1 (admin)
            if(auth()->user()->role == 1) {
                return $next($request);
            }
            // If the user's role is not admin, redirect to /website
            return redirect('/website');
        }

        // If not authenticated, redirect to login page
        return redirect('/login');
    }
}
