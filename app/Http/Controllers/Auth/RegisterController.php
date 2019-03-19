<?php

namespace App\Http\Controllers\Auth;

use App\Model\Lecturer;
use Toast;
use Validator;
use App\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function indexLecturer()
    {
        return view('auth.register_lecturer');
    }

    public function indexStudent()
    {
        //echo "test";
        return view('auth.register_student');
    }

    public function registerLecturer(Request $request)
    {
        $activeLecturer = User::where('user_email',$request->email)
            ->where('user_type','lecturer')->first();
        $password = Hash::make($request->password);
        $activeLecturer->user_password = $password;
        $activeLecturer->save();
        Toast::info('Silahkan lengkapi data profil anda pada halaman profil','Akun anda telah dibuat !');
        return redirect('/dashboard');
    }

    public function registerStudent(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'email'=>'required|max:100|email',
                'password'=>'required|min:6'
            ]);

        if ($validator->fails())
        {
            //return redirect()->back()->withErrors($validator);
            return redirect()->back()->withErrors($validator->errors());
        }
        else
        {
            $user = User::where('user_email',$request->email)->first();
            if($user)
            {
                Toast::info('Email yang anda gunakan untuk mendaftarkan akun baru telah terdaftar, gunakan email lainnya.','Email sudah terdaftar !');
                return redirect()->back();
            }
            else
            {
                User::create([
                    //'name'=>$request->name,
                    'user_email'=>$request->email,
                    'user_password'=>Hash::make($request->password),
                    'user_type'=>'student',
                ]);

                return redirect('/dashboard');
            }
        }
    }

    public function responseEmail(Request $request)
    {
        $activeLecturer = User::where('user_email',$request->email)->where('user_type','lecturer')->first();
        if($activeLecturer)
        {
            return response()->json([
                "status"=>true,
                "code"=>200,
                "message"=>"email ditemukan",
                "data"=>$activeLecturer->user_email,
                "activated"=>$activeLecturer->status
            ]);
        }
        else
        {
            return response()->json([
                "status"=>false,
                "code"=>500,
                "message"=>"email tidak ditemukan"
            ]);
        }

    }
}
