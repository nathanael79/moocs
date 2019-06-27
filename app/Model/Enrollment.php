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

    public function user()
    {
        return $this->hasOne('App\Model\User','id','user_id');
    }

    public function course()
    {
        return $this->hasOne('App\Model\Course','id','course_id');
    }
}
