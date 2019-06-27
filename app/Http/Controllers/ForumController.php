<?php


namespace App\Http\Controllers;


use App\Model\Administrator;
use App\Model\Course;
use App\Model\Forum;
use App\Model\ForumReply;
use App\Model\Lecturer;
use App\Model\Student;
use App\Model\User;
use Illuminate\Http\Request;
use Validator;
use Exception;

class ForumController extends Controller
{
    public function forum($id)
    {
        $forum = Forum::latest()->first();

        $join = Forum::where('course_id',$id)
            ->join('user','forum.user_id','=','user.id')
            /*->join('forum_reply','forum_reply.forum_id','=','forum.id')*/
            ->select(
                'forum.id',
                'forum_questions',
                'forum_descriptions',
                'forum_like',
                'forum.user_id',
                'forum.user_type',
                'user.user_email',
                'user.user_type'
            )
            ->get();

        foreach($join as $item)
        {
            if($item->user_type == 'lecturer')
            {
                $result [] = [
                    'data'=>$item,
                    'user'=>Lecturer::where('user_id',$item->user_id)->select('name','pictures')->first(),
                    'reply'=>ForumReply::where('forum_id',$item->id)->get()
                ];
            }
            else if($item->user_type == 'student')
            {
                $result [] = [
                    'data'=>$item,
                    'user'=>Student::where('user_id',$item->user_id)->select('name','pictures')->first(),
                    'reply'=>ForumReply::where('forum_id',$item->id)->get()
                ];
            }
            else
            {
                $result [] = [
                    'data'=>$item,
                    'user'=>Administrator::where('user_id',$item->user_id)->select('name','pictures')->first(),
                    'reply'=>ForumReply::where('forum_id',$item->id)->get()
                ];
            }
        }

      /* dd($result);*/


        if(!is_null($forum))
        {
            $params =
                [
                    'result'=>$result
                ];

            /*dd($result);*/

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
                'user_id'=>24,
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
                'comment'=>'required|min:6'
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
                'forum_reply_description'=>$request->comment,
                'user_id'=>14,
                'user_type'=>'administrator',
                'forum_id'=>$request->forum_com_id
            ]);
        }

        return redirect()->back()->with('success','Forum created!');
    }

    public function createForumLike($id)
    {
        $forum = Forum::find($id);
        /*dd($forum);*/
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
