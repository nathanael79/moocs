<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $table = 'enrollment';
    protected $fillable =
        [
            'user_id',
            'user_type',
            'course_id'
        ];
}
