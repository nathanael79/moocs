<?php
/**
 * Created by PhpStorm.
 * User: nathanael79
 * Date: 3/5/19
 * Time: 3:28 PM
 */

namespace App\Http\Controllers;


class FrontPageController extends Controller
{
    public function index()
    {
        return view('index');
    }

}
