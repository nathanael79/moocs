<?php


namespace App\Http\Controllers;


use App\Model\Lecturer;
use App\Model\Course;
use App\Model\CourseCategory;
use App\Model\SubCourse;

class CourseController extends Controller
{
    public function getCourseCategory()
    {
        $data = CourseCategory::all();
        foreach ($data as $item)
        {
            $options [] = [
                'id'=>$item->id,
                'text'=>$item->course_category_name
            ];
        }
        return response()->json($options);
    }

    public function getCourses()
    {
        $value = session()->get('activeUser')->id;
        $activeLecturer = Lecturer::where('user_id',$value)->first();
        $course = Course::where('lecturer_id',$activeLecturer->id)->get();
        return response()->json(['data'=>$course]);
    }

    public function getUnconfirmedCourse()
    {
        $unconfirmed_course = Course::where('status','pending')
            ->join('lecturer','course.lecturer_id','=','lecturer.id')
            ->select(
                'course.id',
                'course.course_name',
                'course.keterangan',
                'course.pictures',
                'course.status',
                'course.created_at',
                'lecturer.name'
            )
            ->get();
        return response()->json(['data'=>$unconfirmed_course]);
    }

    public function getSubCourses($id)
    {
        $subCourse = SubCourse::where('course_id',$id)->get();
        return response()->json(['data'=>$subCourse]);
    }

}
