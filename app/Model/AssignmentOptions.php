<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AssignmentOptions extends Model
{
    protected $table = 'assignment_options';
    protected $fillable =
        [
            'assignment_id',
            'assignment_options_name',
            'assignment_options_description',
        ];

    public function assignment()
    {
        return $this->hasOne(Assignment::class);
    }



}
