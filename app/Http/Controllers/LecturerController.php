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
use App\Model\Assignment;
use App\Model\AssignmentOptions;
use App\Model\Course;
use App\Model\Lecturer;
use App\Model\SubCourse;
use App\Model\SubCourseDetail;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Exception;
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
        //dd($data);
        return view('backend.lecturer.profile', $data);
    }

    public function storeProfile(Request $request)
    {
        $id = session()->get('activeUser')->id;
        $lecturer = Lecturer::where('user_id',$id)->first();
        $user = User::find($id);
        if($request->hasFile('image'))
        {
            unlink(public_path().'/images/users/lecturer/'.$lecturer->pictures);
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/images/users/lecturer/',$name);
            $lecturer->nrp_dosen = $request->nrp_dosen;
            $lecturer->name = $request->name;
            $lecturer->gender = $request->gender;
            $lecturer->address = $request->address;
            $lecturer->pictures = $name;
            $lecturer->save();
            $user->user_email = $request->user_email;
            $user->save();

            return redirect()->back();
        }
        else
        {
            $lecturer->nrp_dosen = $request->nrp_dosen;
            $lecturer->name = $request->name;
            $lecturer->gender = $request->gender;
            $lecturer->address = $request->address;
            $lecturer->save();
            $user->user_email = $request->user_email;
            $user->save();

            return redirect()->back();
        }

    }

    public function storePassword(Request $request)
    {
        $lecturer = User::where('id',session()->get('activeUser')->id)->first();
        //dd($lecturer);
            $lecturer->user_password = Hash::make($request->new_password);
            if($lecturer->save()) {
                return redirect('/login')->with('success', 'Success to change your password, relogin again!');
            }
            else
            {
                return redirect()->back()->with('failed','You are failed to change your password');
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

    public function orderId()
    {
        if(SubCourse::where('order_id')->latest()->first);
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

    public function updateCourse(ErrorCourseRequest $request, $id)
    {
        $activeCourse = Course::find($id);
        $lecturer_id = Lecturer::where('user_id', session()->get('activeUser')->id)->first();
        if($request->hasFile('course_picture'))
        {
            $image = $request->file('course_picture');
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/images/courses/',$name);
            $activeCourse->course_name = $request->course_name;
            $activeCourse->keterangan = $request->course_description;
            $activeCourse->course_category_id = $request->course_category_hid;
            $activeCourse->pictures = $name;
            $activeCourse->lecturer_id = $lecturer_id->id;

            if($activeCourse->save())
            {
                return redirect()->back()->with('success','Course has been updated!');
            }
            else
            {
                return redirect()->back()->with('failed','Course failed to update!');
            }
        }
        else
        {
            $activeCourse->course_name = $request->course_name;
            $activeCourse->keterangan = $request->course_description;
            $activeCourse->course_category_id = $request->course_category_hid;
            $activeCourse->lecturer_id = $lecturer_id->id;

            if($activeCourse->save())
            {
                return redirect()->back()->with('success','Course has been updated!');
            }
            else
            {
                return redirect()->back()->with('failed','Course failed to update!');
            }
        }
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
        $cek = SubCourseDetail::latest()->first();
        $order_id = $cek->subcourse_order_id;
        if(!is_null($cek))
        {
            if($request->hasFile('video_file'))
            {
                $video = $request->file('video_file');
                $video_name = $video->getClientOriginalName();
                $video->move(public_path().'/videos/courses/',$video_name);
                $subcoursedetail = SubCourseDetail::create([
                    'sub_course_detail_name'=>$request->content_name,
                    'sub_course_detail_description'=>'empty',
                    'sub_course_detail_type'=>'video',
                    'sub_course_detail_file'=>$video_name,
                    'view'=>0,
                    'sub_course_id'=>$request->sub_course_id,
                    'subcourse_order_id'=>++$order_id

                ]);

                if($subcoursedetail)
                {
                    return redirect('lecturer/sub_course_profile/'.$request->sub_course_id)
                        ->with([
                            'success'=>'Content saved!'
                        ]);
                }
                else
                {
                    return redirect('lecturer/sub_course_profile/'.$request->sub_course_id)
                        ->with([
                            'failed'=>'Content failed to save!'
                        ]);
                }


            }
            else
            {
                $subcoursedetail = SubCourseDetail::create([
                    'sub_course_detail_name'=>$request->content_name,
                    'sub_course_detail_type'=>'text',
                    'sub_course_detail_file'=>'empty',
                    'sub_course_detail_description'=>$request->course_description,
                    'view'=>0,
                    'sub_course_id'=>$request->sub_course_id,
                    'subcourse_order_id'=>++$order_id
                ]);

                if($subcoursedetail)
                {
                    return redirect('lecturer/sub_course_profile/'.$request->sub_course_id)
                        ->with([
                            'success'=>'Content saved!'
                        ]);
                }
                else
                {
                    return redirect('lecturer/sub_course_profile/'.$request->sub_course_id)
                        ->with([
                            'failed'=>'Content failed to save!'
                        ]);
                }
            }
        }
        else
        {
            $order_id = 1;
            if($request->hasFile('video_file'))
            {
                $video = $request->file('video_file');
                $video_name = $video->getClientOriginalName();
                $video->move(public_path().'/videos/courses/',$video_name);
                $subcoursedetail = SubCourseDetail::create([
                    'sub_course_detail_name'=>$request->content_name,
                    'sub_course_detail_description'=>'empty',
                    'sub_course_detail_type'=>'video',
                    'sub_course_detail_file'=>$video_name,
                    'view'=>0,
                    'sub_course_id'=>$request->sub_course_id,
                    'subcourse_order_id'=>$order_id

                ]);

                if($subcoursedetail)
                {
                    return redirect('lecturer/sub_course_profile/'.$request->sub_course_id)
                        ->with([
                            'success'=>'Content saved!'
                        ]);
                }
                else
                {
                    return redirect('lecturer/sub_course_profile/'.$request->sub_course_id)
                        ->with([
                            'failed'=>'Content failed to save!'
                        ]);
                }
            }
            else
            {
                $subcoursedetail = SubCourseDetail::create([
                    'sub_course_detail_name'=>$request->content_name,
                    'sub_course_detail_type'=>'text',
                    'sub_course_detail_file'=>'empty',
                    'sub_course_detail_description'=>$request->course_description,
                    'view'=>0,
                    'sub_course_id'=>$request->sub_course_id,
                    'subcourse_order_id'=>$order_id
                ]);

                if($subcoursedetail)
                {
                    return redirect('lecturer/sub_course_profile/'.$request->sub_course_id)
                        ->with([
                            'success'=>'Content saved!'
                        ]);
                }
                else
                {
                    return redirect('lecturer/sub_course_profile/'.$request->sub_course_id)
                        ->with([
                            'failed'=>'Content failed to save!'
                        ]);
                }

            }
        }


        //dd($request);
    }

    public function storeSubCourse(ErrorSubCourseRequest $request)
    {
        $cek = SubCourse::latest()->first();
        $order_id = $cek->order_id;
        if(!is_null($cek))
        {
            $new_subcourse= SubCourse::create([
                'sub_course_name'=>$request->sub_course_name,
                'course_id'=>$request->course_id,
                'order_id'=>++$order_id
            ]);
        }
        else
        {
            $order_id = 1;
            $new_subcourse= SubCourse::create([
                'sub_course_name'=>$request->sub_course_name,
                'course_id'=>$request->course_id,
                'order_id'=>$order_id
            ]);
        }


        return redirect('/lecturer/sub_course_profile/'.$new_subcourse->id);
    }

    public function courseProfile($id)
    {
        $course = Course::find($id);
        return view('backend.lecturer.course_profile',[
            'course_profile'=>$course
        ]);
    }

    public function updateSubCourse(Request $request)
    {
        $subcourse = SubCourse::find($request->sub_course_id);
        $subcourse->sub_course_name = $request->sub_course_name;
        if($subcourse->save())
        {
            return redirect()->back()->with('success','Sub Course information updated!');
        }
        else
        {
            return redirect()->back()->with('failed','Sub Course information not updated!');
        }
    }

    public function subCourseProfile($id)
    {
        $sub_course = SubCourse::find($id);
        return view('backend.lecturer.sub_course_profile',[
            'sub_course_profile'=>$sub_course
        ]);
    }

    public function deleteSubCourse($id)
    {
        $subcourse = SubCourse::find($id);
        if($subcourse->delete())
        {
            return redirect()->back()->with('success','Sub Course deleted');
        }
        else
        {
            return redirect()->back()->with('failed','Sub Course not deleted');
        }
    }

    public function subCourseDetailContent($id)
    {
        $content = SubCourseDetail::where('sub_course_id',$id)->get();
        return response()->json(['data'=>$content]);
    }

    public function deleteSubCourseDetailContent($id)
    {
        $content = SubCourseDetail::find($id);
        if(!is_null($content->sub_course_detail_file))
        {
            if($content->delete())
            {
                unlink(public_path()."/videos/courses".'/'.$content->sub_course_detail_file);
                return redirect()->back()->with('success','Content deleted!');
            }
            else
            {
                return redirect()->back()->with('failed','Content not deleted!');
            }
        }
        else
        {
            if($content->delete())
            {
                return redirect()->back()->with('success','Content deleted!');
            }
            else
            {
                return redirect()->back()->with('failed','Content not deleted!');
            }
        }

    }

    public function assignmentDetail($id)
    {
        $detail = Assignment::where('sub_course_id',$id)->with('assignmentOptions')->get();

        return response()->json(['data'=>$detail]);
    }



}
