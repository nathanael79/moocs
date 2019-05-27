<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forum';
    protected $fillable =
        [
            'forum_questions',
            'forum_descriptions',
            'forum_like',
            'user_id',
            'user_type',
            'user_status'
        ];

    public function forumReply()
    {
        $this->hasMany('ForumReply');
    }
}
