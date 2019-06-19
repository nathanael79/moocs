<?php


namespace App\Http\Controllers;


use App\Model\Administrator;
use App\Model\Course;
use App\Model\Lecturer;
use App\Model\Student;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('backend.admin.dashboard');
    }

    public function registeredCourse()
    {
        return view('backend.admin.registered_course');
    }

    public function unconfirmedCourse()
    {
        return view('backend.admin.unconfirmed_course');
    }

    public function profile()
    {
        $data = [
            'profile'=>Administrator::where('user_id',session()->get('activeUser')->id)->first(),
            'user'=>User::find(session()->get('activeUser')->id)
        ];

        return view('backend.admin.profile',$data);
    }

    public function storeProfile(Request $request)
    {
        $id = session()->get('activeUser')->id;
        $admin = Administrator::where('user_id',$id)->first();
        $user = User::find($id);
        if($request->hasFile('image'))
        {
            unlink(public_path().'/images/users/admin/'.$admin->pictures);
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/images/users/admin/',$name);
            $admin->name = $request->name;
            $admin->gender = $request->gender;
            $admin->address = $request->address;
            $admin->pictures = $name;
            $admin->save();
            $user->user_email = $request->user_email;
            $user->save();

            return redirect()->back();
        }
        else
        {
            $admin->name = $request->name;
            $admin->gender = $request->gender;
            $admin->address = $request->address;
            $admin->save();
            $user->user_email = $request->user_email;
            $user->save();

            return redirect()->back();
        }
    }

    public function storePassword(Request $request)
    {
        $admin = User::where('id',session()->get('activeUser')->id)->first();
        //dd($lecturer);
        $admin->user_password = Hash::make($request->new_password);
        if($admin->save()) {
            return redirect('/login')->with('success', 'Success to change your password, relogin again!');
        }
        else
        {
            return redirect()->back()->with('failed','You are failed to change your password');
        }
    }


    public function getAllCourse()
    {
        $courses = DB::table('course')
            ->join('lecturer','course.lecturer_id','=','lecturer.id')
            ->select(
                'course.course_name',
                'course.keterangan',
                'course.status',
                'course.created_at',
                'lecturer.name'
            )
            ->get();

        return response()->json(['data'=>$courses]);
    }

    public function getUnconfirmedCourse()
    {
        $unconfirmed_course = Course::where('status','pending')
            ->join('lecturer','course.lecturer_id','=','lecturer.id')
            ->select(
                'course.course_name',
                'course.keterangan',
                'course.status',
                //'course.created_at',
                'lecturer.name'
            )
            ->get();

        return response()->json(['data'=>$unconfirmed_course]);
    }

    public function userStudent()
    {
        return view('backend.admin.student_user');
    }

    public function getStudent()
    {
        $student = User::where('user_type','student')
            ->join('student','student.user_id','=','user.id')
            ->select(
                'user.id',
                'user.user_email',
                'user.status',
                'student.*'
            )
            ->get();

        return response()->json(['data'=>$student]);
    }

    public function getStudentOne(Request $request)
    {
        $student = User::where('user_id',$request->id)
            ->join('student','student.user_id','=','user.id')
            ->select(
                'user.user_email',
                'student.user_id',
                'student.name',
                'student.gender',
                'student.address',
                'student.pictures'
            )
            ->get();

        return response()->json(['data'=>$student]);
    }

    public function createStudent(Request $request)
    {
        $token = str_random('100');
        $activeUser = User::where('user_email',$request->email)->first();
        if($activeUser)
        {
            return redirect()->back()->with('exist','Email for this account is registered');
        }
        else
        {
            $user = User::create([
                'user_email'=>$request->email,
                'user_password'=>Hash::make($request->password),
                'user_type'=>'student',
                'status'=>0,
                'token'=>$token
            ]);


            try {
                $student = new Student();
                $student->name = $request->name;
                $student->gender = $request->gender;
                $student->user_id = $user->id;
                $student->address = $request->address;
                $student->status = 0;
                $name = str_slug(($request->email).'-'.'unknown');
                copy(public_path().'/images/users/unknown.png', public_path().'/images/users/student/'.$name);
                $student->pictures = $name;
                $student->save();

            }catch (Exception $e)
            {
                dd($e);
            }

            return redirect()->back()->with('success','This account was succesfully registered');
        }
    }

    public function updateStudent(Request $request)
    {
        $student = Student::where('user_id',$request->student_id)->first();
        $user = User::where('id',$request->student_id)->first();
        $student->name = $request->modal_name;
        $student->gender = $request->gender;
        $student->address = $request->address;
        $user->user_email = $request->modal_email;
        $user->user_password = Hash::make($request->password);
        if($user->save())
        {
            $student->save();
            return redirect()->back()->with('success','Lecturer account updated!');
        }
        else
        {
            return redirect()->back()->with('failed','Lecturer account failed to update!');
        }
    }

    public function deleteStudent($user_id)
    {
        $activeStudent = User::where('id',$user_id)->first();
        $student = Student::where('user_id',$user_id)->first();
        $destination_path = public_path().'/images/users/lecturer/'.$student->pictures;

        if($student->delete())
        {
            unlink($destination_path);
            return redirect()->back()->with('success','Lecturer deleted');
        }
        else
        {
            return redirect()->back()->with('failed','Lecturer not deleted');
        }
    }

    public function userLecturer()
    {
        return view('backend.admin.lecturer_user');
    }

    public function createLecturer(Request $request)
    {
        $token = str_random('100');
        $activeUser = User::where('user_email',$request->email)->first();
        if($activeUser)
        {
            return redirect()->back()->with('exist','Email for this account is registered');
        }
        else
        {
            $user = User::create([
                'user_email'=>$request->email,
                'user_type'=>'lecturer',
                'status'=>0,
                'token'=>$token
            ]);


            try {
                $lecturer = new Lecturer();
                $lecturer->nrp_dosen = 0;
                $lecturer->name = $request->name;
                $lecturer->user_id = $user->id;
                $name = str_slug(($request->email).'-'.'unknown');
                copy(public_path().'/images/users/unknown.png', public_path().'/images/users/lecturer/'.$name);
                $lecturer->pictures = $name;

                $lecturer->save();
            }catch (Exception $e)
            {
                dd($e);
            }

            return redirect()->back()->with('success','This account was succesfully registered');
        }
    }

    public function deleteLecturer($user_id)
    {
        $activeLecturer = User::where('id',$user_id);
        $lecturer = Lecturer::where('user_id',$user_id)->first();
        $destination_path = public_path().'/images/users/lecturer/'.$lecturer->pictures;
        if($activeLecturer->delete())
        {
            unlink($destination_path);
            return redirect()->back()->with('success','Lecturer deleted');
        }
        else
        {
            return redirect()->back()->with('failed','Lecturer not deleted');
        }
    }

    public function getLecturer()
    {
        $lecturer = User::where('user_type', 'lecturer')
            ->join('lecturer', 'lecturer.user_id', '=', 'user.id')
            ->select(
                'user.id',
                'user.user_email',
                'user.status',
                'lecturer.*'
            )
            ->get();

        return response()->json(['data' => $lecturer]);
    }

    public function getLecturerOne(Request $request)
    {
        $lecturer = User::where('user_id',$request->id)
            ->join('lecturer','lecturer.user_id','=','user.id')
            ->select(
                'user.user_email',
                'lecturer.user_id',
                'lecturer.nrp_dosen',
                'lecturer.name',
                'lecturer.gender',
                'lecturer.address',
                'lecturer.pictures'
            )
            ->get();

        return response()->json(['data'=>$lecturer]);
    }

    public function updateLecturer(Request $request)
    {
        $lecturer = Lecturer::where('user_id',$request->lecturer_id)->first();
        $user = User::where('id',$request->lecturer_id)->first();
        $lecturer->nrp_dosen = $request->nrp_dosen;
        $lecturer->name = $request->modal_name;
        $lecturer->gender = $request->gender;
        $lecturer->address = $request->address;
        $user->user_email = $request->modal_email;
        $user->user_password = Hash::make($request->password);
        if($lecturer->save())
        {
            $user->save();
            return redirect()->back()->with('success','Lecturer account updated!');
        }
        else
        {
            return redirect()->back()->with('failed','Lecturer account failed to update!');
        }
    }


    public function userAdmin()
    {
        return view('backend.admin.admin_user');
    }

    public function getAdmin()
    {
        $admin = User::where('user_type','administrator')
            ->join('administrator','administrator.user_id','=','user.id')
            ->select(
                'user.id',
                'user.user_email',
                'user.status',
                'administrator.*'
            )
            ->get();

        return response()->json(['data'=>$admin]);
    }

    public function getAdminOne(Request $request)
    {
        $admin = User::where('user_id',$request->id)
            ->join('administrator','administrator.user_id','=','user.id')
            ->select(
                'user.user_email',
                'administrator.user_id',
                'administrator.name',
                'administrator.gender',
                'administrator.address',
                'administrator.pictures'
            )
            ->get();

        return response()->json(['data'=>$admin]);
    }

    public function createAdmin(Request $request)
    {
        $token = str_random('100');
        $activeUser = User::where('user_email',$request->email)->first();
        if($activeUser)
        {
            return redirect()->back()->with('exist','Email for this account is registered');
        }
        else
        {
            $user = User::create([
                'user_email'=>$request->email,
                'user_password'=>Hash::make($request->password),
                'user_type'=>'administrator',
                'status'=>0,
                'token'=>$token
            ]);


            try {
                $admin = new Administrator();
                $admin->name = $request->name;
                $admin->gender = $request->gender;
                $admin->user_id = $user->id;
                $admin->address = $request->address;
                $name = str_slug(($request->email).'-'.'unknown');
                copy(public_path().'/images/users/unknown.png', public_path().'/images/users/student/'.$name);
                $admin->pictures = $name;
                $admin->save();

            }catch (Exception $e)
            {
                dd($e);
            }

            return redirect()->back()->with('success','This account was succesfully registered');
        }
    }

    public function updateAdmin(Request $request)
    {
        $admin = Administrator::where('user_id',$request->admin_id)->first();
        $user = User::where('id',$request->admin_id)->first();
        $admin->name = $request->modal_name;
        $admin->gender = $request->gender;
        $admin->address = $request->address;
        $user->user_email = $request->modal_email;
        $user->user_password = Hash::make($request->password);
        if($admin->save())
        {
            $user->save();
            return redirect()->back()->with('success','Lecturer account updated!');
        }
        else
        {
            return redirect()->back()->with('failed','Lecturer account failed to update!');
        }
    }

    public function deleteAdmin($user_id)
    {
        $activeAdmin = User::where('id',$user_id)->first();
        $admin = Administrator::where('user_id',$user_id)->first();
        $destination_path = public_path().'/images/users/admin/'.$admin->pictures;

        if($admin->delete())
        {
            unlink($destination_path);
            return redirect()->back()->with('success','Admin deleted');
        }
        else
        {
            return redirect()->back()->with('failed','Admin not deleted');
        }
    }


}
