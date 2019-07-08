<?php


namespace App\Http\Controllers;


use App\Model\Assignment;
use App\Model\AssignmentHistory;
use App\Model\AssignmentScore;
use App\Model\Course;
use App\Model\SubCourse;
use App\Model\SubCourseDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MatterController extends Controller
{
    public function index($id)
    {
        $course = Course::where('id',$id)->with('subCourse.subCourseDetail')->with('subCourse.assignment')->first();
        $assignmentCount=SubCourse::where('course_id',$id)->get();
        $curData=[];
        foreach ($assignmentCount as $key =>$item){
            $assign=Assignment::where('sub_course_id',$item->id)->get();
            foreach ($assign as $key1 =>$item1)
            {
                $curData[]=[
                    'id'=>$item1->id
                ];
            }
        }
        $params =
            [
                'course'=>$course,
                'assign'=>$curData
            ];

        return view('matter',$params);
    }

    public function getData(Request $request)
    {
        $content = SubCourseDetail::find($request->id);

        return response()->json(['data'=>$content]);
    }

    public function getQuestion(Request $request)
    {
        $question = Assignment::where('id',$request->id)->with('assignmentOptions')->first();
        return response()->json(['data'=>$question]);
    }

    public function submitAssignment(Request $request)
    {
        DB::beginTransaction();
        try{
            $assignmentCount=SubCourse::where('course_id',$request->course_id)->get();
            $count=0;
            $currData=[];
            $assignData=[];
            foreach ($assignmentCount as $key =>$item){
                $assign=Assignment::where('sub_course_id',$item->id)->get();
                $count+=Assignment::where('sub_course_id',$item->id)->count();
                foreach ($assign as $key1 =>$item1)
                {
                    if(!is_null($request->input("value-$item1->id"))){
                        $currData[]=[
                            'id'=>$item1->id,
                            'value'=>$request->input("value-$item1->id")
                        ];
                    }
                    $assignData[]=[
                        'id'=>$item1->id,
                        'value'=>$item1->assignment_answer
                    ];
                }
            }

            if($count!=count($currData)){
                return "<div class='alert alert-warning'>Submission belum lengkap!</div>";
            }

            foreach ($currData as $key =>$item2){
                $assignHistory= new AssignmentHistory();
                $assignHistory->user_id=Session::get('activeUser')->id;
                $assignHistory->user_type=Session::get('activeUser')->user_type;
                $assignHistory->user_answer=$item2['value'];
                $assignHistory->assignment_id=$item2['id'];
                $assignHistory->save();
            }

            $calculateScore=($this->calculateScore($assignData,$currData)/$count)*100;
            $assignScore=new AssignmentScore();
            $assignScore->user_id=Session::get('activeUser')->id;
            $assignScore->course_id=$request->course_id;
            $assignScore->score=$calculateScore;
            $assignScore->save();

            DB::commit();
            return "
            <div class='alert alert-success'>Submission berhasil disimpan!</div>
            <script></script>";
        }catch (\Exception $e){
            DB::rollBack();
            return "<div class='alert alert-danger'>Terjadi kesalahan! Submission disimpan!</div>";
        }


    }

    private  function calculateScore($data,$submissionData)
    {
        $counter=0;
        foreach ($data as $key =>$item)
        {
            if($item['id']==$submissionData[$key]['id']){
                if($item['value']==$submissionData[$key]['value']){
                    $counter++;
                }
            }
        }

        return $counter;

    }
}
