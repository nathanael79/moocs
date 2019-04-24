<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'course_name'=>'required|min:6',
            'course_description'=>'required|min:6',
            'course_picture'=>'required|image|max:10000|mimes:png,jpeg',
            'course_category'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'course_name.required'=>'Course Name is required',
            'course_name.min'=>'Course Name length must be min. 6 characters',
            'course_description.required'=>'Course Description is required',
            'course_description.min'=>'Course Description length must be min. 6 characters',
            'course_picture.required'=>'Course Picture is required',
            'course_picture.max'=>'Your file must be less than 10MB',
            'course_picture.mimes'=>'Your file extension must be .png or .jpeg',
            'course_category.required'=>'Course Category is required'
        ];
    }
}
