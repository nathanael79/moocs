<?php

namespace App\Http\Middleware;

use Closure;

class Lecturer
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
        if(session('activeUser')->user_type == 'lecturer')
        {
            return $next($request);
        }
        else
        {
            return redirect('/logout')>with('failed','You dont have access!');
        }
    }
}
