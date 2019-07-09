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
            'course_id'
        ];

    public function forumReply()
    {
        $this->hasMany('App\Model\ForumReply');
    }

    public function user()
    {
        return $this->hasOne('App\Model\User','id','user_id');
    }

/*    public function user()
    {
        $this->
    }*/
}
