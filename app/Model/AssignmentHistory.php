<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Assignment;

class AssignmentHistory extends Model
{
    protected $table = 'assignment_history';
    protected $fillable =
        [
            'user_id',
            'user_status',
            'user_type',
            'user_answer'.
            'assignment_id',
            'created_at',
            'updated_at'
        ];
}
