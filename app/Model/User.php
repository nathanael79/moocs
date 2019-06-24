<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    protected $table = 'user';
    protected $fillable =
        [
            'user_type',
            'user_email',
            'user_password',
            'login_at',
            'token',
            'status'
        ];

    public function Administrator()
    {
        return $this->hasMany('App\Administrator','user_id','id');
    }

    public function Lecturer()
    {
        return $this->hasMany('App\Lecturer','user_id','id');
    }

    public function Student()
    {
        return $this->hasMany('App\Student','user_id','id');
    }
}
