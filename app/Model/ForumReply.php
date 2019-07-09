<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ForumReply extends Model
{
    protected $table = 'forum_reply';
    protected $fillable =
        [
            'forum_reply_description',
            'user_id',
            'user_type',
            'user_status',
            'forum_id'
        ];

    public function forum()
    {
        return $this->hasOne('App\Model\Forum','id','forum_id');
    }

    public function user()
    {
        return $this->hasOne('App\Model\User','id','user_id');
    }
}
