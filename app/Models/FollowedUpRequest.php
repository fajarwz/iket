<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FollowedUpRequest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'request_id', 
        'target_date', 
        'target_completion_date',
        'technician',
        'is_done'
    ];

    protected $hidden = [

    ];

    public function user_request(){
        return $this->hasOne(UserRequest::class, 'id', 'request_id');
    }
}
