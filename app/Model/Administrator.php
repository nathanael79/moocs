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
            'token',
            'status',
            'created_at',
            'updated_at'
        ];
}
