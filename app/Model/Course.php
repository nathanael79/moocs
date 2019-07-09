<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    protected $fillable =
        [
            'course_name',
            'keterangan',
            'pictures',
            'lecturer_id',
            'course_category_id',
            'status',
        ];

    public function lecturer()
    {
        return $this->hasOne('App\Model\Lecturer','id','lecturer_id');
    }

    public function subCourse()
    {
        return $this->hasMany('App\Model\SubCourse');
    }

    public function enrollment()
    {
        return $this->hasOne('App\Model\Enrollment','course_id','id');
    }

    public function certificate()
    {
        return $this->hasMany('App\Model\Certificate');
    }

    public function courseCategory()
    {
        return $this->hasOne('App\Model\CourseCategory','id','course_category_id');
    }


}
