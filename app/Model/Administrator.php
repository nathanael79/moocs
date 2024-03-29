<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $table = 'administrator';
    protected $fillable =
        [
            'name',
            'gender',
            'address',
/*            'token',
            'status',*/
            'created_at',
            'updated_at'
        ];

    public function user()
    {
       return $this->hasOne('App\Model\User','id','user_id');
    }
}
