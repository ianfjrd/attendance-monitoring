<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // dd($role);
        if(Auth::user()->role->name == "Admin" && $role == "Admin"){
            return $next($request);
        }
        elseif(Auth::user()->role->name != "Admin" && $role == "User") {
            return $next($request);
        }
        elseif(Auth::user()->role->name == "Admin" && $role == "User") {
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }

        
    }
}
