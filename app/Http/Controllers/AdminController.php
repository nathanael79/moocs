<?php


namespace App\Http\Controllers;


use App\Model\Administrator;
use App\Model\Course;
use App\Model\Lecturer;
use App\Model\Student;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('backend.admin.dashboard');
    }

    public function registeredCourse()
    {
        return view('backend.admin.registered_course');
    }

    public function unconfirmedCourse()
    {
        return view('backend.admin.unconfirmed_course');
    }

    public function getAllCourse()
    {
        $courses = DB::table('course')
            ->join('lecturer','course.lecturer_id','=','lecturer.id')
            ->select(
                'course.course_name',
                'course.keterangan',
                'course.status',
                'course.created_at',
                'lecturer.name'
            )
            ->get();

        return response()->json(['data'=>$courses]);
    }

    public function getUnconfirmedCourse()
    {
        $unconfirmed_course = Course::where('status','pending')
            ->join('lecturer','course.lecturer_id','=','lecturer.id')
            ->select(
                'course.course_name',
                'course.keterangan',
                'course.status',
                //'course.created_at',
                'lecturer.name'
            )
            ->get();

        return response()->json(['data'=>$unconfirmed_course]);
    }

    public function userStudent()
    {
        return view('backend.admin.student_user');
    }

    public function getStudent()
    {
        $student = User::where('user_type','student')
            ->join('student','student.user_id','=','user.id')
            ->select(
                'user.user_email',
                'user.status',
                'student.name',
                'student.gender',
                'student.address',
                'student.created_at'
            )
            ->get();

        return response()->json(['data'=>$student]);
    }

    public function userLecturer()
    {
        return view('backend.admin.lecturer_user');
    }

    public function createLecturer(Request $request)
    {
        $token = str_random('100');
        $activeUser = User::where('user_email',$request->email)->first();
        if($activeUser)
        {
            return redirect()->back()->with('exist','Email for this account is registered');
        }
        else
        {
            $user = User::create([
                'user_email'=>$request->email,
                'user_type'=>'lecturer',
                'status'=>0,
                'token'=>$token
            ]);


            try {
                $lecturer = new Lecturer();
                $lecturer->nrp_dosen = 0;
                $lecturer->name = $request->name;
                $lecturer->user_id = $user->id;
                $name = str_slug(($request->email).'-'.'unknown');
                copy(public_path().'/images/users/unknown.png', public_path().'/images/users/lecturer/'.$name);
                $lecturer->pictures = $name;

                $lecturer->save();
            }catch (Exception $e)
            {
                dd($e);
            }

            return redirect()->back()->with('success','This account was succesfully registered');
        }
    }

    public function deleteLecturer($id)
    {
        $activeLecturer = User::find($id);
        $lecturer = Lecturer::where('user_id',$id)->first();
        $destination_path = public_path().'/images/users/lecturer/'.$lecturer->pictures;
        if($activeLecturer->delete())
        {
            unlink($destination_path);
            return redirect()->back()->with('success','Lecturer deleted');
        }
        else
        {
            return redirect()->back()->with('failed','Lecturer not deleted');
        }
    }

    public function getLecturer()
    {
        $lecturer = User::where('user_type', 'lecturer')
            ->join('lecturer', 'lecturer.user_id', '=', 'user.id')
            ->select(
                'user.id',
                'user.user_email',
                'user.status',
                'lecturer.*'
            )
            ->get();

        return response()->json(['data' => $lecturer]);
    }

    public function getLecturerOne(Request $request)
    {
        $lecturer = User::where('user_id',$request->id)
            ->join('lecturer','lecturer.user_id','=','user.id')
            ->select(
                'user.user_email',
                'lecturer.user_id',
                'lecturer.nrp_dosen',
                'lecturer.name',
                'lecturer.gender',
                'lecturer.address',
                'lecturer.pictures'
            )
            ->get();

        return response()->json(['data'=>$lecturer]);
    }

    public function updateLecturer(Request $request)
    {
        $lecturer = Lecturer::where('user_id',$request->lecturer_id)->first();
        $lecturer->nrp_dosen = $request->nrp_dosen;
        $lecturer->name = $request->modal_name;
        $lecturer->gender = $request->gender;
        $lecturer->address = $request->address;
        if($lecturer->save())
        {
            return redirect()->back()->with('success','Lecturer account updated!');
        }
        else
        {
            return redirect()->back()->with('failed','Lecturer account failed to update!');
        }
    }


    public function userAdmin()
    {
        return view('backend.admin.admin_user');
    }

    public function getAdmin()
    {
        $admin = User::where('user_type','administrator')
            ->join('administrator','administrator.user_id','=','user.id')
            ->select(
                'user.user_email',
                'user.status',
                'administrator.name',
                'administrator.gender',
                'administrator.address',
                'administrator.created_at'
            )
            ->get();

        return response()->json(['data'=>$admin]);
    }


}
