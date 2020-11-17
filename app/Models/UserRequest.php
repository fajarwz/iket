<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRequest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'requests';

    protected $fillable = [
        'request_created_date', 
        'client_name', 
        'department_id', 
        'computer_id', 
        'break_id', 
        'kind_of_repair',
        'description'
    ];

    protected $hidden = [

    ];

    public function followed_up_request(){
        return $this->hasOne(FollowedUpRequest::class);
    }

    public function verified_request(){
        return $this->hasOne(VerifiedRequest::class);
    }
}
