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
            if(Auth::user()->role_id !== 1){

                return redirect('/login');
            }
        }

        return $next($request);
    }
}
