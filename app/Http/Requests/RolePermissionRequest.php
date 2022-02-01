<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolePermissionRequest extends FormRequest
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
            'permission_id'  => 'required',
            'role'           => 'required',
        ];
    }

    public function messages()
    {
        return [
            'permission_id.required'  => 'The permission field is required..',
            'role.required'           => 'The role field is required..',
        ];
    }
}
