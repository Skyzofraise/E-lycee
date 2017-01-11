<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthenticateTeacher
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
        if (!Auth::check())
            return redirect('login');
        if (Auth::user()->role === 'teacher')
            return $next($request);
         
        return redirect()->action('StudentController@index');
    }
}
