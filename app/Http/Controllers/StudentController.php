<?php
/**
 * Created by PhpStorm.
 * User: nathanael79
 * Date: 3/25/19
 * Time: 4:36 PM
 */

namespace App\Http\Controllers;
use Session;


class StudentController extends Controller
{
    public function __construct()
    {
        if(!Session::get('login_email'))
        {
            return redirect('/login')->with('error_login',1);
        }
        else
        {
            //
        }
    }

    public function dashboard() //index
    {
        return view('backend.student.dashboard');
    }

    public function completed() //index
    {
        return view('backend.student.completed');
    }

    public function accomplishment() //index
    {
        return view('backend.student.accomplishment');
    }

    public function profile()
    {
        return view('backend.student.profile');
    }
}
