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

        Route::post('/logout',
            [
                "uses"=>"Auth\LoginController@logout",
                "as"=>"post_logout"
            ]);

        Route::get('/dashboard',
            [
                "uses"=>"DashboardController@index",
                "as"=>"dashboard_page_student"
            ]);

        //testing
        Route::get('/coba',
            [
                "uses"=>"CobaController@index",
                "as"=>"coba_page_1"
            ]);

        Route::get('/coba2',
            [
                "uses"=>"CobaController@index2",
                "as"=>"coba_page_2"
            ]);

        Route::get('/coba3',
            [
                "uses"=>"CobaController@index3",
                "as"=>"coba_page_2"
            ]);

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
