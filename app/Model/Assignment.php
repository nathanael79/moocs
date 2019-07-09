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
            'order_id',
            'created_at',
            'updated_at'
        ];

    public function subCourse()
    {
        return $this->hasOne('App\Model\SubCourse','id','sub_course_id');
    }

    public function assignmentHistory()
    {
        return $this->hasMany('App\Model\AssignmentHistory');
    }

    public function assignmentOptions()
    {
        return $this->hasMany('App\Model\AssignmentOptions');
    }
}
