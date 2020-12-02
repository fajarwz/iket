<?php

namespace App\Http\Requests\Technician;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\UserRequest;

class FollowedUpRequestRequest extends FormRequest
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
            'target_date'             => 'exclude_if:is_done,BATAL,BELUM SELESAI|date_format:Y-m-d|after_or_equal:request_created_date', 
            'target_completion_date'  => 'exclude_if:is_done,BATAL,BELUM SELESAI|date_format:Y-m-d|after_or_equal:target_date|before_or_equal:today', 
            'technician'              => 'exists:users,name|max:100', 
            'is_done'                 => 'in:BELUM SELESAI,SELESAI,BATAL', 
            'technician_note'         => 'max:255',
        ];
    }
}
