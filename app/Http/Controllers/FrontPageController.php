<?php
/**
 * Created by PhpStorm.
 * User: nathanael79
 * Date: 3/5/19
 * Time: 3:28 PM
 */

namespace App\Http\Controllers;


use App\Model\Course;
use App\Model\Lecturer;

class FrontPageController extends Controller
{
    public function index()
    {
        /*$course = Course::latest()->limit('6')->get();
        $lecturer = Lecturer::latest()->limit('6')->get();*/
        $course = Course::latest()->paginate('6');
        $lecturer = Lecturer::latest()->paginate('6');
        $params =
            [
                'course'=>$course,
                'lecturer'=>$lecturer
            ];
        //dd($params);
        return view('index',$params);
    }

    public function getAllCourse()
    {
        $params = [
            'course'=>Course::latest()->paginate('6')
        ];
        return view('all-courses', $params);
    }

    public function singleCourse($id)
    {
/*        $params =
            [
                'single-course'=>Course::find($id)
            ];*/
        $params = Course::find($id);
        return view('single-courses',$params);

    }

    public function lecturerProfile($id)
    {
        $params =
            [
                'lecturer'=>Lecturer::find($id),
                /*->join('user','lecturer.user_id','=','user.id')->get()*/
                'course'=>Course::where('lecturer_id',$id)->paginate('3')
            ];
        //dd($params);

        return view('lecturer-profile',$params);
    }



}
