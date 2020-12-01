<?php

namespace App\Http\Requests\Technician;

use Illuminate\Foundation\Http\FormRequest;

class TechAddUserRequest extends FormRequest
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
            'name'                  => 'required|string|min:2|max:100',
            'username'              => 'exclude_if:is_edit,true|required|string|min:2|max:100|unique:users,username',
            'password'              => 'exclude_if:is_edit,true|required|string|min:2|max:100',
            'confirm_password'      => 'exclude_if:is_edit,true|required|string|min:2|max:100|same:password',
            'dept_code'             => 'required|integer|exists:departments,dept_code', 
            'role'                  => 'in:USER'
        ];
    }
}
