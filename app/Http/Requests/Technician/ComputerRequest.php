<?php

namespace App\Http\Requests\Technician;

use Illuminate\Foundation\Http\FormRequest;

class ComputerRequest extends FormRequest
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
            'ip'            => 'exclude_if:is_edit,true|required|ipv4|unique:computers,ip',
            'comp_name'     => 'required|max:100'
        ];
    }
}
