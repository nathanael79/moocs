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
use App\Model\ForumReply;
use App\Model\Student;
use App\Model\User;
use App\Model\SubCourse;
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

    public function joinCourse()
    {
        $data = Course::join('sub_course','course.id','=','sub_course.course_id')
            ->join('sub_course_detail','sub_course.course_id','=','sub_course_detail.sub_course_id')
            ->get();

        dd($data);
    }

    public function cobaku()
    {
        $data = Course::find('id')->with('subCourse')->with('subCourseDetail')->get();
        dd($data);
        $params=[
            'course'=>$data
        ];

        return view('coba.coba',$params);
    }





}
