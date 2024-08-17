<?php

namespace App\Http\Middleware\AdminOrUser;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role = 'admin'): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Allow access if the user has the role 'admin'
            if ($user->role == 'admin') {
                return $next($request);
            }

            // Allow access if the user has the role 'user' and trying to access allowed routes
            if ($user->role == 'user') {
                if ($request->is('userHomes/*')) {
                    return $next($request);
                } else {
                    return redirect()->route('user.homes.addHome')->with('error', 'You cannot visit this site');
                }
            }
        }

        // Redirect back if the user is not authenticated or has no permission
        return redirect()->back()->with('error', 'You cannot visit this site');
    }
}
