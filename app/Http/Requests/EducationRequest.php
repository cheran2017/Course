<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
            'specializtion'       => 'required',
            'college'           => 'required',
            'degree'           => 'required',
            'location'           => 'required',
        ];
    }

    public function messages()
    {
        return [
            'specializtion.required'  => 'The specializtion field is required..',
            'college.required'  => 'The College field is required..',
            'degree.required'  => 'The Degree field is required..',
            'locaion.required'  => 'The Locaion field is required..',
        ];
    }
}
