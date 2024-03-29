<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    protected $table = 'course_category';
    protected $fillable =
        [
            'course_category_name',
            'course_id'
        ];

    public function course()
    {
        return $this->hasMany('App\Model\Course');
    }
    public $timestamps = false;
}
