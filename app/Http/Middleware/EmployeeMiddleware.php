<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check())
        {
            if(auth()->user()->role == 'employee' || auth()->user()->role == 'admin')
            {
                return $next($request);
            }
            else
            {
                return abort(401);
            }
        }
        return redirect()->route('employeelogin');
        // return $next($request);
    }
}
