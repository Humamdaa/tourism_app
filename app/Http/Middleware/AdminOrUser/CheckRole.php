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
        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request);
        }
        else if(Auth::check()&& Auth::user()->role == 'user'){
            return redirect()->route('checkout');
        }
        return redirect()->back()->with('error','you can not visit this site');
//        return redirect('/login')->with('error','you can not visit this site');
    }
}
