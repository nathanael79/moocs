<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class SubCourse extends Model
{
    protected $table = 'sub_course';
    protected $fillable =
        [
            'sub_course_name',
            'course_id',
            'order_id'
        ];


    public function course()
    {
        return $this->hasOne('App\Model\Course','id','course_id');
    }

    public function subCourseDetail()
    {
        return $this->hasMany('App\Model\SubCourseDetail');
    }

    public function assignment()
    {
        return $this->hasMany('App\Model\Assignment');
    }
}
