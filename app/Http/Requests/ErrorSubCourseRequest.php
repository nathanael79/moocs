<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorSubCourseRequest extends FormRequest
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
            'sub_course_name'=>'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'sub_course_name.required'=>'Sub Course Name is required',
            'sub_course_name.min'=>'Sub Course Name length length must be min.6 characters'

        ];
    }
}
