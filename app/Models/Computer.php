<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Computer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'ip', 'comp_name', 'user_name'
    ];

    protected $hidden = [

    ];
}
