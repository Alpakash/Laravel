<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Foundation\Testing\HttpException;
use Illuminate\Support\Facades\Auth;

class AuthMaintenance
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
        if(Auth::check()){

            if(Auth::user()->email !== 'admin@sgpr.nl'){
                return redirect('/home');
            }
        }

        return $next($request);
    }
}
