<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Lecturer;
use App\Model\Administrator;
use App\Model\Student;

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

    public function administrator()
    {
        return $this->hasMany('App\Model\Administrator');
    }

    public function lecturer()
    {
        return $this->hasMany('App\Model\Lecturer');
    }

    public function student()
    {
        return $this->hasMany('App\Model\Student');
    }

    public function forum()
    {
        return $this->hasMany('App\Model\Forum');
    }

    public function forumReply()
    {
        return $this->hasMany('App\Model\ForumReply');
    }

    public function enrollment()
    {
        return $this->hasMany('App\Model\Enrollment');
    }

    public function assignmentHistory()
    {
        return $this->hasMany('App\Model\AssignmentHistory');
    }
}
