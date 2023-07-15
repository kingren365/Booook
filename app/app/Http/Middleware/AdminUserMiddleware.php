<?php

namespace App\Http\Middleware;

use Closure;

class AdminUserMiddleware
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
        if (session()->has('admin_user_id') && session()->has('admin_name') && session()->has('admin_email')) {
            return $next($request);
        }
        return redirect()->route('admin.login.form');
    }
}
