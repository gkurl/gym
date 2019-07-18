<?php

namespace App\Http\Middleware;

use Closure;


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

        if(\Auth::check()) {

            if(\Auth::user()->role_id > 1) {
                return view('user-index');
            }

        } else {

            return view('login')->with('message', 'Access denied. Please login.');
        }


        return $next($request);
    }
}
