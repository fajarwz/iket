<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VerifiedRequest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'followed_up_request_id', 
        'is_verified'
    ];

    protected $hidden = [

    ];

    public function followed_up_request(){
        return $this->hasOne(FollowedUpRequest::class, 'id', 'followed_up_request_id');
    }
}
