<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $fillable =
        [
            'name',
            'gender',
            'address',
            'pictures',
            'status'
/*            'token',
            'status',*/
        ];

    public function user()
    {
        return $this->hasOne('App\Model\User','id','user_id');
    }
}
