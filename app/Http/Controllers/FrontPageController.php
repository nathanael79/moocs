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
        $course = Course::latest()->limit('6')->get();
        $lecturer = Lecturer::latest()->limit('6')->get();
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
            'course'=>Course::all()
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



}
