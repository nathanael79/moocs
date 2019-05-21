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

        //LECTURER ROUTE
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

        Route::get('/getCourses',
            [
                "uses"=>"CourseController@getCourses",
                "as"=>"get_course_data"
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

        Route::post('/storeProfile',
            [
                "uses"=>"LecturerController@storeProfile",
                "as"=>"lecturer_store_profile"
            ]);

        Route::post('/storePassword',
            [
                "uses"=>"LecturerController@storePassword",
                "as"=>"lecturer_store_password"
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

        Route::get('/course_profile/{id}',
            [
                "uses"=>"LecturerController@courseProfile",
                "as"=>"lecturer_course_profile_page"
            ]);

        Route::post('/storeSubCourse',
            [
                "uses"=>"LecturerController@storeSubCourse",
                "as"=>"lecturer_store_sub_course"
            ]);

        Route::get('/create_content/{id}',
            [
                "uses"=>"LecturerController@createContent",
                "as"=>"lecturer_create_sub_course_page"
            ]);

        Route::post('/storeContent',
            [
                "uses"=>"LecturerController@storeContent",
                "as"=>'lecturer_store_sub_course_content'
            ]);

        Route::get('/sub_course_profile/{id}',
            [
                "uses"=>"LecturerController@subCourseProfile",
                "as"=>"lecturer_sub_course_profile_page"
            ]);

        Route::get('/getSubCourses/{id}',
            [
                "uses"=>"CourseController@getSubCourses",
                "as"=>"get_sub_courses_data"
            ]);

        Route::get('/create_question',
            [
                "uses"=>"LecturerController@subCourseQuestion",
                "as"=>"lecturer_sub_course_page"
            ]);



    });

    Route::group(['prefix'=>'/admin'],function (){

        Route::get('/',
            [
                'uses'=>'AdminController@dashboard',
                'as'=>'admin_dashboard_page'
            ]);

        Route::get('/unconfirmedCourse',
            [
                'uses'=>'AdminController@unconfirmedCourse',
                'as'=>'admin_unconfirmed_course_page'
            ]);

        Route::get('/getUnconfirmed',
            [
                'uses'=>'AdminController@getUnconfirmedCourse',
                'as'=>'admin_get_unconfirmed_course'

            ]);

        Route::get('/registeredCourse',
            [
                'uses'=>'AdminController@registeredCourse',
                'as'=>'admin_registered_course_page'
            ]);

        Route::get('/getAllCourse',
            [
                'uses'=>'AdminController@getAllCourse',
                'as'=>'admin_get_all_course'

            ]);

        Route::get('/userStudent',
            [
                'uses'=>'AdminController@userStudent',
                'as'=>'admin_user_student_page'
            ]);

        Route::get('/getStudent',
            [
                'uses'=>'AdminController@getStudent',
                'as'=>'admin_get_student'
            ]);

        Route::get('/userLecturer',
            [
                'uses'=>'AdminController@userLecturer',
                'as'=>'admin_user_lecturer_page'
            ]);

        Route::get('/getLecturer',
            [
                'uses'=>'AdminController@getLecturer',
                'as'=>'admin_get_lecturer'
            ]);

        Route::get('/userAdmin',
            [
                'uses'=>'AdminController@userAdmin',
                'as'=>'admin_user_admin_page'
            ]);


    });



});
