<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
      // print_r(auth()->user()->is_admin);
      // die();
        if (auth()->user()->is_admin == 1) {
            return $next($request);
        }
        // return $next($request);
        return redirect('home')->with('error', "Anda tidak dapat mengakses halaman ini!");
    }
}
