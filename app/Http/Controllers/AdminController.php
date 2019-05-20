<?php


namespace App\Http\Controllers;


use App\Model\Course;
use App\Model\User;
use Illuminate\Support\Facades\DB;

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

    public function userStudent()
    {
        return view('backend.admin.student_user');
    }

    public function userLecturer()
    {
        return view('backend.admin.lecturer_user');
    }

    public function userAdmin()
    {
        return view('backend.admin.admin_user');
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


}