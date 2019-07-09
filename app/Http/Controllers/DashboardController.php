<?php
/**
 * Created by PhpStorm.
 * User: nathanael79
 * Date: 3/5/19
 * Time: 9:37 PM
 */

namespace App\Http\Controllers;
use Session;


class DashboardController extends Controller
{
    public function __construct()
    {
        if(!Session::get('login_email'))
        {
            return redirect('/login')->with('error_login',1);
        }
    }

    public function index()
    {
        return view('dashboard');
    }

}
