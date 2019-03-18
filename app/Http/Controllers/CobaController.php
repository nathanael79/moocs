<?php
/**
 * Created by PhpStorm.
 * User: nathanael79
 * Date: 3/10/19
 * Time: 1:09 AM
 */

namespace App\Http\Controllers;


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

}
