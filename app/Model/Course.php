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

    public function subCourse()
    {
        return $this->hasMany('App\SubCourse','course_id','id');
    }

    public function subCourseDetail()
    {
        return $this->subCourse()->with('subCourseDetail');
    }

    public function enrollment()
    {
        return $this->hasMany('enrollment');
    }

    public function certificate()
    {
        $this->hasMany('Certificate');
    }


}
