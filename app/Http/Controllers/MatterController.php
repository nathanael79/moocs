<?php


namespace App\Http\Controllers;


use App\Model\Course;
use App\Model\SubCourseDetail;
use Illuminate\Http\Request;

class MatterController extends Controller
{
    public function index($id)
    {
        $course = Course::where('id',$id)->with('subCourse.subCourseDetail')->with('subCourse.assignment')->first();
        $params =
            [
                'course'=>$course
            ];
        /*dd($params);*/
        return view('matter',$params);
    }

    public function getData(Request $request)
    {
        $content = SubCourseDetail::find($request->id);

        return response()->json(['data'=>$content]);
    }
}
