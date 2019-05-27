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
        ];

    public function subCourseDetail()
    {
        $this->hasMany('SubCourseDetail');
    }
}
