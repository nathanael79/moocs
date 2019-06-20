<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $table = 'assignment';
    protected $fillable =
        [
            'assignment_question',
            'assignment_answer',
            'assignment_score',
            'sub_course_id',
            'created_at',
            'updated_at'
        ];

    public function assignment_history()
    {
        return $this->hasMany('AssignmentHistory');
    }

    public function assignment_options()
    {
        return $this->hasMany('AssignmentOptions');
    }
}
