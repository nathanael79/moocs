<?php

namespace App\Http\Controllers\Auth;

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
        $validator = Validator::make($request->email,
            [
                //'name'=>'required|max:30',
                'email'=>'required|max:100|email',
                //'password'=>'required|min:6'
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
                return redirect('');
            }
            else
            {
                User::create([
                    //'name'=>$request->name,
                    'user_email'=>$request->email,
                    'user_password'=>Hash::make($request->password),
                    'user_type'=>'lecturer',
                ]);

                return redirect('/dashboard');
            }
        }
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

    public function getResponseEmail(Request $request)
    {
        $activeLecturer = User::where('user_email',$request->email)
            ->where('user_type','lecturer')->first();
        if($activeLecturer)
        {
            return true;
        }
        else
        {
            return false;
        }

    }
}
