<?php


namespace App\Http\Controllers;


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
        $course = Course::all();
        return response()->json(['data'=>$course]);
    }

    public function getSubCourses()
    {
        $subCourse = SubCourse::all();
        return response()->json(['data'=>$subCourse]);
    }

}
