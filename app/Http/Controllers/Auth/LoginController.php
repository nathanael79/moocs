<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Administrator;
use App\Model\Student;
use App\Model\User;
use App\Model\Lecturer;
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
        $activeUser = User::where(['user_email'=>$request->user_email])->first();
        $id = $activeUser->id;
        if($activeUser)
        {
            if(Hash::check($request->user_password,$activeUser->user_password))
            {
                $request->session()->put('activeUser',$activeUser);
                switch ($activeUser->user_type)
                {
                    case "student":
                        $activeProfile = Student::where('user_id',$id)->first();
                        $request->session()->put('activeProfile',$activeProfile->pictures);
                        if($activeUser->status == 0)
                        {
                            Toast::success('','Jangan lupa verifikasi email kamu !');
                        }
                        return redirect('/dashboard');
                        break;

                    case "lecturer":
                        $activeProfile = Lecturer::where('user_id',$id)->first();
                        $request->session()->put('activeProfile',$activeProfile->pictures);
                        if($activeUser->status == 0)
                        {
                            Toast::success('','Jangan lupa verifikasi email kamu !');
                        }
                        return redirect('/lecturer/courses');
                        break;

                    case "administrator":
                        $activeProfile = Administrator::where('user_id',$id)->first();
                        $request->session()->put('activeProfile',$activeProfile->pictures);
                        return redirect('/admin');
                        break;
                    default:
                        return redirect('/');
                }
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
