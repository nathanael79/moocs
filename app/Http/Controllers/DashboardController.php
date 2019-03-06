<?php
/**
 * Created by PhpStorm.
 * User: nathanael79
 * Date: 3/5/19
 * Time: 9:37 PM
 */

namespace App\Http\Controllers;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

}
