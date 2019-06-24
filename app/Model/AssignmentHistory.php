<?php

namespace App\Model;

use App\Model\Assignment;
use Illuminate\Database\Eloquent\Model;

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

    public function assignment()
    {
        return $this->hasOne(Assignment::class);
    }
}
