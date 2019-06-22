<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorSubCourseContent extends FormRequest
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
            'content_name'=>'required|min:6',
            'video_file'=>'max:100000|mimetypes:video/mp4,video/webm,video/ogg',
            //'course_description'=>'min:6'
        ];
    }
}
