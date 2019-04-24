<?php


namespace App\Http\Controllers;


use App\Model\CourseCategory;

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

}
