<?php
/**
 * Created by PhpStorm.
 * User: nathanael79
 * Date: 3/20/19
 * Time: 1:11 PM
 */

namespace App\Http\Controllers;


use App\Model\User;
use Illuminate\Http\Request;
use Toast;

class MailController extends Controller
{
    public function index()
    {
        return view('backend.mail.register');
    }

    public function confirmation($email, $token)
    {
        $activeUser = User::where('user_email',$email)->where('token',$token)->first();
        $activeUser->status = 1;
        $activeUser->token = 0;
        $activeUser->save();

        return redirect('/login');
        Toast::success('Email telah dikonfirmasi','Email kamu sekarang sudah aktif !');
    }

}
