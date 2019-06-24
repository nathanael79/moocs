<?php


namespace App\Http\Controllers;


use App\Model\Course;
use App\Model\Forum;
use App\Model\ForumReply;
use App\Model\User;
use Illuminate\Http\Request;
use Validator;
use Exception;

class ForumController extends Controller
{
    public function forum($id)
    {
        $forum = Forum::latest()->first();

        $user = User::where('id',$forum->user_id)->get();

        $data = Forum::where('course_id',$id)
            ->join('course','forum.course_id','=','course.id')
            ->join('user','forum.user_id','=','user.id')
            ->get();
        if(!is_null($forum))
        {
            $params =
                [
                    'data'=>$data
                ];
            dd($user);
            return view('forum',$params);
        }
        else
        {
            return view('forum');
        }
    }

    public function createForum(Request $request)
    {
        $user = User::find($request->user_id);

        $validator = Validator::make($request->all(),
            [
                'question'=>'required|min:6',
                'question_desc'=>'required|min:6'
            ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors());
        }
        else
        {
            /*  $forum = Forum::create([
                  'forum_questions'=>$request->question,
                  'forum_descriptions'=>$request->question_desc,
                  'user_id'=>$user->id,
                  'user_type'=>$user->user_type,
                  'course_id'=>$request->user_id

              ]);*/


            $forum = Forum::create([
                'forum_questions'=>$request->question,
                'forum_descriptions'=>$request->question_desc,
                'user_id'=>27,
                'user_type'=>'lecturer',
                'course_id'=>1

            ]);

            return redirect()->back()->with('success','Forum created!');
        }

    }

    public function createReply(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'forum_reply_desc'=>'required|min:6'
            ]);

        $user = User::find($request->user_id);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors());
        }
        else
        {
            /*            $reply = ForumReply::create([
                            'forum_reply_description'=>$request->forum_reply_desc,
                            'user_id'=>$user->id,
                            'user_type'=>$user->user_type,
                            'forum_id'=>$request->forum_id
                        ]);*/

            $reply = ForumReply::create([
                'forum_reply_description'=>$request->forum_reply_desc,
                'user_id'=>27,
                'user_type'=>'lecturer',
                'forum_id'=>1
            ]);
        }

        return redirect()->back()->with('success','Forum created!');
    }

    public function createForumLike($id)
    {
        $forum = Forum::find($id);
        if(!is_null($forum->forum_like))
        {
            ++$forum->forum_like;
            $forum->save();

            return redirect()->back();
        }
        else
        {
            $like = 1;
            $forum->forum_like = $like;
            $forum->save();

            return redirect()->back();
        }
    }


}
