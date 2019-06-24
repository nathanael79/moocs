<?php


namespace App\Http\Controllers;


use App\Model\Assignment;
use App\Model\AssignmentOptions;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
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
            return redirect()->back('success','Question success!');
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

            return redirect()->back()->with('success','Question success!');

        }
    }

}
