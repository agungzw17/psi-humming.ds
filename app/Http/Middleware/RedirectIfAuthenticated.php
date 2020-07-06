<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_name' => 'Admin'])) {
            return redirect('/dashboard');
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_name' => 'User'])) {
            return redirect('/landing-page');
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_name' => 'User Homestay'])) {
            return redirect('/landing-page');
        }

        return $next($request);
    }
}
