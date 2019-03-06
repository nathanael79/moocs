<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $table = 'lecturer';
    protected $fillable =
        [
            'nrp_dosen',
            'password',
            'gender',
            'address',
            'token',
        ];

    public function course()
    {
        return $this->hasMany('Course');
    }

    public function certificate()
    {
        return $this->hasMany('Certificate');
    }
}
