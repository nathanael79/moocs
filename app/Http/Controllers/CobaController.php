<?php
/**
 * Created by PhpStorm.
 * User: nathanael79
 * Date: 3/10/19
 * Time: 1:09 AM
 */

namespace App\Http\Controllers;


use App\Model\Course;
use App\Model\SubCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

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

}
