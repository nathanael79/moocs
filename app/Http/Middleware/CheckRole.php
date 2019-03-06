<?php

namespace App\Http\Middleware;

use App\Model\User;
use Closure;

class CheckRole
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
        $user = User::find($request->email);
        if($user)
        {
            if($user->user_type == 'student')
            {
                return $next($request);
            }
            else {
                return redirect('/');
            }
        }
        else
        {
            return redirect('/');
        }

    }
}
