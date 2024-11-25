<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // if(auth()->user()->role == $role) {
        //     return $next($request);
        // }
        
        // return response()->json(['message' => 'Unauthorized. Only users not Akses.'], 403);
    }

    // public function handle($request, Closure $next, $guard = null);
    // {
    //     if (!Auth::guard($guard)->check()) {
    //         dd('User not authenticated', Auth::guard($guard)->user());
    //         return redirect()->route('login');
    //     }
    //     return $next($request);
    // }

}
