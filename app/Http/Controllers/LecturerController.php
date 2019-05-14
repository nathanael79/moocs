<?php
/**
 * Created by PhpStorm.
 * User: nathanael79
 * Date: 3/27/19
 * Time: 3:28 PM
 */

namespace App\Http\Controllers;


use App\Http\Requests\ErrorCourseRequest;
use App\Http\Requests\ErrorPasswordRequest;
use App\Http\Requests\ErrorProfileLecturerRequest;
use App\Http\Requests\ErrorSubCourseContent;
use App\Http\Requests\ErrorSubCourseRequest;
use App\Model\Course;
use App\Model\Lecturer;
use App\Model\SubCourse;
use App\Model\SubCourseDetail;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Session;

class LecturerController extends Controller
{
    public function __construct()
    {

    }

    public function dashboard() //index
    {
        return view('backend.lecturer.dashboard');
    }

    public function courses()
    {
        $data =
            [
                'totalCourse'=>Course::all()->count(),
            ];
        return view('backend.lecturer.courses',['data'=>$data]);
    }

    public function profile()
    {
        //$id = Session::get('activeUser')->id;
        $data = [
            'profile'=>Lecturer::where('user_id',session()->get('activeUser')->id)->first(),
            'user'=>User::find(session()->get('activeUser')->id)
        ];
        //dd($profile);
        return view('backend.lecturer.profile', ['data' => $data]);
    }

    public function storeProfile(ErrorProfileLecturerRequest $request)
    {
        $lecturer = Lecturer::where('user_id',session()->get('activeUser')->id)
            ->update([
                'nrp_dosen'=>$request->lecturer_nrp,
                'name'=>$request->lecturer_name,
                'gender'=>$request->lecturer_gender,
                'address'=>$request->lecturer_address,
                'pictures'=>$request->lecturer_image
            ]);

    }

    public function storePassword(ErrorPasswordRequest $request)
    {
        $lecturer = User::where('id',session()->get('activeUser')->id)->first();
        if(Hash::check($request->old_password,$lecturer->user_password))
        {
            $lecturer->user_password = Hash::make($request->new_password);
            return redirect('/login');
        }
        else
        {
            return redirect()->back();
        }

    }

    public function uncompleted()
    {
        return view('backend.lecturer.uncompleted_courses');
    }

    public function completed()
    {
        return view('backend.lecturer.completed');
    }

    public function accomplishment()
    {
        return view('backend.lecturer.accomplishment');
    }

    public function createCourse()
    {
        return view('backend.lecturer.form_course');
    }

    public function deleteCourse($id)
    {
        $course = Course::find($id);
        //delete cascade
    }
    

    public function storeCourse(ErrorCourseRequest $request)
    {
        $image = $request->file('course_picture');
        $name = $image->getClientOriginalName();
        $image->move(public_path().'/images/courses/',$name);
        //dd($request->all());
        $lecturer_id = Lecturer::where('user_id', session()->get('activeUser')->id)->first();
        $new_course = Course::create([
            "course_name"=>$request->course_name,
            "course_category_id"=>$request->course_category_hid,
            "keterangan"=>$request->course_description,
            "pictures"=>$name,
            'lecturer_id'=>$lecturer_id->id,
            "status"=>"pending"
        ]);
        //dd($new_course);

        return redirect('/lecturer/course_profile/'.$new_course->id)->with([
            'success'=>'success','Your courses has been created',
        ]);
    }

    public function createContent($id)
    {
        $sub_course = SubCourse::find($id);
        return view('backend.lecturer.form_sub_course',[
            'sub_course'=>$sub_course
        ]);
    }

    public function storeContent(ErrorSubCourseContent $request)
    {
        if($request->hasFile('video_file'))
        {
            $video = $request->file('video_file');
            $video_name = $video->getClientOriginalName();
            $video->move(public_path().'/videos/courses/',$video_name);
            SubCourseDetail::create([
                'sub_course_detail_name'=>$request->content_name,
                'sub_course_detail_type'=>'video',
                'sub_course_detail_file'=>$video_name,
                'view'=>0,
                'sub_course_id'=>$request->sub_course_id,

            ]);

            return redirect('lecturer/sub_course_profile/'.$request->sub_course_id);
        }
        else
        {
            SubCourseDetail::create([
                'sub_course_detail_name'=>$request->content_name,
                'sub_course_detail_type'=>'text',
                'sub_course_detail_description'=>$request->course_description,
                'view'=>0,
                'sub_course_id'=>$request->sub_course_id
            ]);

            return redirect('lecturer/sub_course_profile/'.$request->sub_course_id);
        }

        //dd($request);
    }

    public function storeSubCourse(ErrorSubCourseRequest $request)
    {
        $new_subcourse= SubCourse::create([
            'sub_course_name'=>$request->sub_course_name,
            'course_id'=>$request->course_id
        ]);

        return redirect('/lecturer/sub_course_profile/'.$new_subcourse->id);
    }

    public function courseProfile($id)
    {
        $course = Course::find($id);
        return view('backend.lecturer.course_profile',[
            'course_profile'=>$course
        ]);
    }

    public function subCourseProfile($id)
    {
        $sub_course = SubCourse::find($id);
        return view('backend.lecturer.sub_course_profile',[
            'sub_course_profile'=>$sub_course
        ]);
    }

    public function subCourseQuestion()
    {
        return view('backend.lecturer.form_question');
    }

}
