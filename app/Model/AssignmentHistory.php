<?php

namespace App\Model;

use App\Model\Assignment;
use Illuminate\Database\Eloquent\Model;

class AssignmentHistory extends Model
{
    protected $table = 'assignmentHistory';
    public $timestamps=true;
    public function assignment()
    {
        return $this->hasOne('App\Model\Assignment','id','assignment_id');
    }

    public function user()
    {
        return $this->hasOne('App\Model\User','id','user_id');
    }
}
