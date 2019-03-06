<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $activeUser = User::where('user_email',$request->email)->first();
        if($activeUser)
        {
            if(Hash::check($request->password,$activeUser->user_password))
            {
                return redirect('/dashboard');
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            //return redirect('/register');
            echo "user tidak ketemu";
        }
    }

    public function logout()
    {
        //
    }
}
