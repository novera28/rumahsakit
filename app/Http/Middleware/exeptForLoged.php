<?php

namespace App\Http\Middleware;

use Session;
use Closure;

class exeptForLoged
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
        if (!Session::has('credential')) {
            return $next($request);
        } else {
            return redirect()->back()->with('message',"anda sudah login");
        }
    }
}
