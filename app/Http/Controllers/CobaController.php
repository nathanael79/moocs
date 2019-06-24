<?php
/**
 * Created by PhpStorm.
 * User: nathanael79
 * Date: 3/10/19
 * Time: 1:09 AM
 */

namespace App\Http\Controllers;


use App\Model\Assignment;
use App\Model\AssignmentOptions;
use App\Model\Course;
use App\Model\Forum;
use App\Model\SubCourse;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;
use Validator;

class CobaController extends Controller
{
    public function index()
    {
        //return view('layouts.front_end.index');
        return view('layouts.front_end.frontend_register');
    }

    public function index2()
    {
        return view('layouts.front_end.index');
    }

    public function index3()
    {
        return view('mail.mail_layout');
    }

    public function index4()
    {
        return view('layouts.front_end.blog-single');
    }

    public function index5()
    {
        $params =
            [
                'course'=>Course::paginate(15),
            ];
        return view('all-courses',$params);
    }

    public function copyFile(Request $request)
    {
        $email = 'imanuelronaldo@gmail.com';
        $name = str_slug($email.'-'.'unknown');
        try {
            copy(public_path().'/images/users/unknown.png', public_path().'/images/users/student/'.$name);
        }catch (Exception $e)
        {
            echo 'message = '.$e->getMessage();
        }
    }

    public function testVideo()
    {
        return view('coba.coba');
    }

    public function subCourse()
    {
        $data = SubCourse::with('subCourseDetail')->get();
        return response()->json($data);
    }

    public function increment()
    {
        $a = 'a';
        ++$a;
        echo $a;
    }

    public function createQuestion(Request $request)
    {
       $cek = Assignment::latest()->first();

      if(!is_null($cek))
        {
            $order_id = $cek->order_id;
            $assignment = Assignment::create([
                'assignment_question'=>$request->question,
                'sub_course_id'=>$request->sub_course_id_q,
                'order_id'=>++$order_id
            ]);

            $answer_true = $request->opsi_huruf;

            $options_desc = [];
            $options_desc=$request->options_desc;
            $options_name = 'a';
            foreach ($options_desc as $item => $data)
            {
                $assignment_options = new AssignmentOptions();
                $assignment_options->assignment_id = $assignment->id;
                $assignment_options->assignment_options_name = $options_name;
                $assignment_options->assignment_options_description = $options_desc[$item];
                $assignment_options->save();

                if($options_desc[$item] == $answer_true)
                {
                    $assignment->assignment_answer = $options_name;
                    $assignment->save();
                }
                ++$options_name;
            }
     }else
        {
            $order_id = 1;
            $assignment = Assignment::create([
                'assignment_question'=>$request->question,
                'sub_course_id'=>$request->sub_course_id_q,
                'order_id'=>$order_id
            ]);
            $answer_true = $request->opsi_huruf;

            $options_desc = [];
            $options_desc=$request->options_desc;
            $options_name = 'a';
            foreach ($options_desc as $item => $data)
            {
                $assignment_options = new AssignmentOptions();
                $assignment_options->assignment_id = $assignment->id;
                $assignment_options->assignment_options_name = $options_name;
                $assignment_options->assignment_options_description = $options_desc[$item];
                $assignment_options->save();

                if($options_desc == $answer_true)
                {
                    $assignment->assignment_answer = $options_name;
                    $assignment->save();
                }
                ++$options_name;
            }

        }
    }

    public function forum()
    {
        return view('forum');
    }

    public function createForum(Request $request)
    {
        $user = User::find($request->user_id);

        $validator = Validator::make($request->all(),
            [
                'question'=>'required|min:6',
                'forum_desc'=>'required|min:6'
            ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors());
        }
        else
        {
          /*  $forum = Forum::create([
                'forum_questions'=>$request->question,
                'forum_descriptions'=>$request->forum_desc,
                'user_id'=>$user->id,
                'user_type'=>$user->user_type

            ]);*/

            $forum = Forum::create([
                'forum_questions'=>$request->question,
                'forum_descriptions'=>$request->forum_desc,
                'user_id'=>27,
                'user_type'=>'lecturer'

            ]);

            return redirect()->back()->with('success','Forum created!');
        }




    }

}
