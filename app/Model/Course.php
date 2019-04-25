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
            'status'
        ];

    public function subCourse()
    {
        return $this->hasMany('SubCourse');
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
