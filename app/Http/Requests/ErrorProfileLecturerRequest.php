<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorProfileLecturerRequest extends FormRequest
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
            'nrp_dosen'=>'required|min:6|max:18',
            'name'=>'required|min:3',
            'gender'=>'required',
            'address'=>'required|min:6',
            'pictures'=>'required|image|max:5000'
        ];
    }
}
