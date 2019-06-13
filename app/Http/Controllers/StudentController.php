<?php
/**
 * Created by PhpStorm.
 * User: nathanael79
 * Date: 3/25/19
 * Time: 4:36 PM
 */

namespace App\Http\Controllers;
use App\Model\Course;
use App\Model\Student;
use App\Model\User;
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
        $data = [
            'profile'=>Student::where('user_id',session()->get('activeUser')->id)->first(),
            'user'=>User::find(session()->get('activeUser')->id)
        ];
        return view('backend.student.profile', $data);
    }

    public function storeProfile(Request $request)
    {
        $id = session()->get('activeUser')->id;
        $student = Student::where('user_id',$id)->first();
        $user = User::find($id);
        if($request->hasFile('image'))
        {
            unlink(public_path().'/images/users/student/'.$student->pictures);
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/images/users/student/',$name);
            $student->name = $request->name;
            $student->gender = $request->gender;
            $student->address = $request->address;
            $student->pictures = $name;
            $student->save();
            $user->user_email = $request->user_email;
            $user->save();

            return redirect()->back();
        }
        else
        {
            $student->name = $request->name;
            $student->gender = $request->gender;
            $student->address = $request->address;
            $student->save();
            $user->user_email = $request->user_email;
            $user->save();

            return redirect()->back();
        }
    }

    public function storePassword()
    {

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
