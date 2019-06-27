<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubCourseDetail extends Model
{
    protected $table = 'sub_course_detail';
    protected $fillable =
        [
            'sub_course_detail_name',
            'sub_course_detail_file',
            'sub_course_detail_type',
            'sub_course_detail_description',
            'view',
            'sub_course_id',
            'subcourse_order_id'
        ];

    public function subCourse()
    {
        return $this->hasOne('App\Model\SubCourse','id','sub_course_id');
    }
}
