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
            'pictures'
            /*'token',*/
        ];

    public function user()
    {
        return $this->hasOne('App\Model\User','id','user_id');
    }

    public function course()
    {
        return $this->hasMany('App\Model\Course');
    }

    public function certificate()
    {
        return $this->hasMany('App\Model\Certificate');
    }

}
