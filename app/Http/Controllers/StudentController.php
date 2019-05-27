<?php
/**
 * Created by PhpStorm.
 * User: nathanael79
 * Date: 3/25/19
 * Time: 4:36 PM
 */

namespace App\Http\Controllers;
use App\Model\Course;
use Illuminate\Http\Request;
use Session;
use Validator;


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

    public function store_content(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'course_name'=>'required|min:6',
            'pictures'=>'file|max:10000',

        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors());
        }
        else
        {
            $course_content = Course::create([
                'course_name'=>$request->course_name,
                'pictures'=>$request->file('pictures')->store('public/files')
            ]);

            if($course_content)
            {

            }


        }
    }
}
