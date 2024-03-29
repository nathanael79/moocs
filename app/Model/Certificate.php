<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table = 'certificate';
    protected $fillable =
        [
            'certificate_name',
            'lecturer_id',
            'course_id',
            'user_id',
            'user_type',
            'created_at',
            'updated_at'
        ];

    public function lecturer()
    {
        return $this->belongsTo('App\Model\Lecturer');
    }

    public function course()
    {
        return $this->belongsTo('App\Model\Course');
    }

}
