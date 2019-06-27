<?php


namespace App\Http\Controllers;


use App\Model\Course;

class MatterController extends Controller
{
    public function index($id)
    {
        $course = Course::where('id',$id)->with('subCourse.subCourseDetail')->first();
        $params =
            [
                'course'=>$course
            ];
        /*dd($params);*/
        return view('matter',$params);
    }

}
