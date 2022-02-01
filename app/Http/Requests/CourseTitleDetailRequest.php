<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseTitleDetailRequest extends FormRequest
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
            'course_title_id'       => 'required',
            'description'           => 'required',
        ];
    }

    public function messages()
    {
        return [
            'course_title_id.required'  => 'The Course Title field is required..',
            'description.required'      => 'The Description field is required..',
        ];
    }
}
