<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    protected $fillable =
        [
            'course_name',
            'pictures',
            'lecturer_id',
        ];

    public function subCourse()
    {
        return $this->hasMany('SubCourse');
    }

    public function courseCategory()
    {
        return $this->hasMany('CourseCategory');
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
