<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\User;
//use Grimthorr\LaravelToast\Toast;
use Toast;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Session;

class LoginController extends Controller
{
/*    public function __construct()
    {

    }*/

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        /*$toast = new Toast();*/
        $activeUser = User::where('user_email',$request->user_email)->first();
        if($activeUser)
        {
            if(Hash::check($request->user_password,$activeUser->user_password))
            {
                $request->session()->put('login_email',$activeUser->user_email);
                switch ($activeUser->user_type)
                {
                    case "student":
                        if($activeUser->status == 0)
                        {
                            Toast::success('','Jangan lupa verifikasi email kamu !');
                        }
                        return redirect('/dashboard');
                        break;

                    case "lecturer":
                        if($activeUser->status == 0)
                        {
                            Toast::success('','Jangan lupa verifikasi email kamu !');
                        }
                        return redirect('/lecturer');
                        break;

                    case "admin":
                        return redirect('/admin');
                        break;
                }






/*                if($activeUser->user_type == 'student')
                {
                    if($activeUser->status == 0)
                    {

                        Toast::success('','Jangan lupa verifikasi email kamu !');
                    }
                    return redirect('/dashboard');
                }
                else if($activeUser->status == 'lecturer')
                {
                    if($activeUser->status == 0)
                    {

                        Toast::success('','Jangan lupa verifikasi email kamu !');
                    }
                    return redirect('/lecturer');
                }
                else
                {
                    if($activeUser->status == 0)
                    {

                        Toast::success('','Jangan lupa verifikasi email kamu !');
                    }
                    return redirect('/admin');
                }*/

            }
            else
            {
                /*$toast->error('Password yang anda masukkan salah', 'Password Salah');*/
                Toast::error('Password yang anda masukkan salah', 'Password Salah');
                return redirect()->back();
            }
        }
        else
        {
            //$toast = new Toast();
            Toast::error('Akun tidak ditemukan', '404');
            return redirect('/register');
            //dd(Session::get('not_found'));
            //echo "user tidak ketemu";
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Toast::info('Untuk dapat mengakses fitur fitur pembelajaran, silahkan login kembali','Logout berhasil');
        return redirect('/login');
    }
}
