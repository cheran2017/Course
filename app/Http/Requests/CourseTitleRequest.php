<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseTitleRequest extends FormRequest
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
            'course_id'       => 'required',
            'title'           => 'required',
        ];
    }

    public function messages()
    {
        return [
            'course_id.required'  => 'The Course field is required..',
            'title.required'  => 'The Title field is required..',
        ];
    }
}
