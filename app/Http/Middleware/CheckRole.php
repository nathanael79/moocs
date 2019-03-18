<?php

namespace App\Http\Middleware;

use App\Model\User;
use Closure;
use Session;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct()
    {
        if(!Session::get('login_email'))
        {
            return redirect('/login');
        }
    }

    public function handle($request, Closure $next)
    {
            $user = User::find($request->user_email);
            if ($user) {
                if ($user->user_type == 'student') {
                    return $next($request);
                } else {
                    return redirect('/');
                }
            } else {
                return redirect('/');
            }
    }
}
