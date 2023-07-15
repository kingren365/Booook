<?php

namespace App\Http\Middleware;

use Closure;

class UserLoginMiddleware
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
        if (session()->has('user_id') && session()->has('name') && session()->has('email') && session()->has('tel') && session()->has('adnumber') && session()->has('adress')) {
            return $next($request);
        }
        return redirect()->route('user.home');
    }
}
