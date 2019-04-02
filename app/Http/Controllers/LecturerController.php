<?php
/**
 * Created by PhpStorm.
 * User: nathanael79
 * Date: 3/27/19
 * Time: 3:28 PM
 */

namespace App\Http\Controllers;


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
        return view('backend.lecturer.courses');
    }

    public function profile()
    {
        return view('backend.lecturer.profile');
    }

}
