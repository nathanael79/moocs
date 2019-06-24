<?php


namespace App\Http\Controllers;


use App\Model\Course;
use App\Model\Enrollment;
use App\Model\User;
use Session;

class EnrollmentController extends Controller
{
    public function enroll($id)
    {
        $course = Course::find($id);
        $user = User::find(Session::get('user_id'));
        $enroll = Enrollment::create([
            'user_id'=>$user->id,
            'user_type'=>$user->user_type,
            'course_id'=>$course->id
        ]);

        return redirect()->back()->with('success','Success to enroll this course');
    }

}
