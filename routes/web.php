<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix'=>'/'],function (){
    Route::get('/',
        [
            "uses"=>"FrontPageController@index",
            "as"=>"index_page"
        ]);

    Route::get('/register',
        [
            "uses"=>"Auth\RegisterController@indexStudent",
            "as"=>"register_page_student"
        ]);

    Route::post('/register',
        [
            "uses"=>"Auth\RegisterController@registerStudent",
            "as"=>"post_register_student"
        ]);

//    Route::group(),function ()
//    {
        Route::get('/login',
            [
                "uses"=>"Auth\LoginController@index",
                "as"=>"login_page"
            ]);

        Route::post('/login',
            [
                "uses"=>"Auth\LoginController@login",
                "as"=>"post_login"
            ]);

        Route::get('/dashboard',
            [
                "uses"=>"DashboardController@index",
                "as"=>"dashboard_page_student"
            ]);
    //});

    Route::group(['prefix'=>'/lecturer'],function (){
       Route::get('/',
           [
               "uses"=>'Auth\LoginController@index',
               "as"=>"lecturer_first_page"
           ]);

       Route::get('/register',
           [
               "uses"=>"Auth\RegisterController@indexLecturer",
               "as"=>"lecturer_register_page"

           ]);

       Route::get('/email_check',
           [
               "uses"=>"Auth\RegisterController@responseEmail",
               "as"=>"lecturer_check_email"
           ]);
    });



});
