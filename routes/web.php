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

        Route::get('/logout',
            [
                "uses"=>"Auth\LoginController@logout",
                "as"=>"post_logout"
            ]);

        Route::get('/dashboard',
            [
                "uses"=>"StudentController@dashboard",
                "as"=>"dashboard_page_student"
            ]);

        Route::get('/completed',
            [
                "uses"=>"StudentController@completed",
                "as"=>"completed_page_student"
            ]);

        Route::get('/accomplishment',
            [
                "uses"=>"StudentController@accomplishment",
                "as"=>"accomplishment_page_student"
            ]);

        Route::get('/profile',
            [
                "uses"=>"StudentController@profile",
                "as"=>"profile_page_student"
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
                "as"=>"coba_page_3"
            ]);

        Route::get('/coba4',
            [
                "uses"=>"CobaController@index4",
                "as"=>"coba_page_4"
            ]);

        //email

        Route::get('/confirm/{email}/{token}',
            [
                "uses"=>"MailController@confirmation",
                "as"=>"confirmation_action"
            ]);

        Route::get('/coursecategory',
            [
                "uses"=>"CourseController@getCourseCategory",
                "as"=>"get_course_category"
            ]);

    Route::group(['prefix'=>'/lecturer'],function (){

        Route::get('/',
            [
                "uses"=>"LecturerController@dashboard",
                "as"=>"dashboard_page_lecturer"

            ]);

        Route::get('/register',
           [
               "uses"=>"Auth\RegisterController@indexLecturer",
               "as"=>"lecturer_register_page"

           ]);

        Route::post('/register',
           [
               "uses"=>"Auth\RegisterController@registerLecturer",
               "as"=>"lecturer_register_post"
           ]);

        Route::get('/email_check',
           [
               "uses"=>"Auth\RegisterController@responseEmail",
               "as"=>"lecturer_check_email"
           ]);

        Route::get('/courses',
            [
                "uses"=>"LecturerController@courses",
                "as"=>"lecturer_courses_page"
            ]);

        Route::get('/uncompleted_courses',
            [
                "uses"=>"LecturerController@uncompleted",
                "as"=>"lecturer_uncompleted_courses_page"
            ]);

        Route::get('/profile',
            [
                "uses"=>"LecturerController@profile",
                "as"=>"lecturer_profile_page"
            ]);

        Route::get('/completed_courses',
            [
                "uses"=>"LecturerController@completed",
                "as"=>"lecturer_completed_courses_page"
            ]);

        Route::get('/accomplishment',
            [
                "uses"=>"LecturerController@accomplishment",
                "as"=>"lecturer_accomplishment_page"
            ]);

        Route::get('/create_course',
            [
                "uses"=>"LecturerController@createCourse",
                "as"=>"lecturer_create_course_page"
            ]);

        Route::post('/storeCourse',
            [
                "uses"=>"LecturerController@storeCourse",
                "as"=>"lecturer_store_course"
            ]);

        Route::get('/course_profile',
            [
                "uses"=>"LecturerController@courseProfile",
                "as"=>"lecturer_course_profile_page"
            ]);

        Route::post('/storeSubCourse',
            [
                "uses"=>"LecturerController@storeSubCourse",
                "as"=>"lecturer_store_sub_course"
            ]);

        Route::get('/create_sub_course',
            [
                "uses"=>"LecturerController@createSubCourse",
                "as"=>"lecturer_create_sub_course_page"
            ]);

        Route::get('/sub_course_profile',
            [
                "uses"=>"LecturerController@subCourseProfile",
                "as"=>"lecturer_sub_course_profile_page"
            ]);

        Route::get('/create_question',
            [
                "uses"=>"LecturerController@subCourseQuestion",
                "as"=>"lecturer_sub_course_page"
            ]);



    });



});
