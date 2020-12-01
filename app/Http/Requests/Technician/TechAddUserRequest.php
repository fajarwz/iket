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
            'username'              => 'required_without:is_edit|string|min:2|max:100',
            'password'              => 'required_without:is_edit|string|max:100|min:3',
            'confirm_password'      => 'required_without:is_edit|string|max:100|min:3|same:password',
            'dept_code'             => 'required|integer', 
            'role'                  => 'in:USER'
        ];
    }
}
