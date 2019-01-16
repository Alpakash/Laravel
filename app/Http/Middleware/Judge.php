<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Judge
{

    public function __construct()
    {
        $this->middleware('judge');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::check() && Auth::user()->role->role == 'Judge') {
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
