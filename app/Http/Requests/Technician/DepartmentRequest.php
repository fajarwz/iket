<?php

namespace App\Http\Requests\Technician;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'dept_code'     => 'exclude_if:is_edit,true|required|unique:departments,dept_code|max:100', 
            'name'          => 'required|max:100'
        ];
    }
}
