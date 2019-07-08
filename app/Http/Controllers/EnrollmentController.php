<?php


namespace App\Http\Controllers;


use App\Model\Course;
use App\Model\Enrollment;
use App\Model\User;
use Session;
use Exception;

class EnrollmentController extends Controller
{
    public function enroll($id)
    {
        $course = Course::find($id);
        $user = User::find(Session::get('activeUser')->id);
        $activeLearner = Enrollment::where('user_id',$user)->first();
        if($activeLearner)
        {
            return redirect('/matter/'.$course->id);
        }
        else
        {
            try {
                $enroll = Enrollment::create([
                    'user_id' => $user->id,
                    'user_type' => $user->user_type,
                    'course_id' => $course->id
                ]);
            }catch (Exception $e)
            {
                echo 'Message :'.$e->getMessage();
            }

            return redirect('/matter/'.$course->id)->with('success','Success to enroll this course');
        }
    }

}
