<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard("student")->check()) {
            return redirect()->route("student.home.index");
        } elseif(Auth::guard("teacher")->check()) {
            return redirect()->route("teacher.home.index");
        } elseif(Auth::guard("user")->check()){
            return redirect()->route("admin.home.index");
        }
        
        return $next($request);
    }
}
