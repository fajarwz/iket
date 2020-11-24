<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RequestRequest extends FormRequest
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
            'request_created_date'  => 'required|date_format:Y-m-d|', 
            'client_name'           => 'required|max:100', 
            'department_id'         => 'required|integer|exists:departments,dept_code', 
            'computer_id'           => 'required|integer|exists:computers,id', 
            'break_id'              => 'required|integer|exists:breaks,id', 
            'kind_of_repair'        => 'required|in:PERBAIKAN,FASILITAS',
            'description'           => 'required|max:255'
        ];
    }
}
