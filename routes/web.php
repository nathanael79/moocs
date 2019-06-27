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

        Route::post('/store-profile',
            [
                'uses'=>'StudentController@storeProfile',
                'as'=>'student_store_profile'
            ]);

        Route::post('/store-password',
            [
                'uses'=>'StudentController@storePassword',
                'as'=>'student_store_password'
            ]);

        Route::get('/all-course',
            [
                'uses'=>'FrontPageController@getAllCourse',
                'as'=>'all_course_page'
            ]);

        Route::get('/single-course/{id}',
            [
                'uses'=>'FrontPageController@singleCourse',
                'as'=>'single_course_page'
            ]);

        Route::get('/lecturer-profile/{id}',
            [
                'uses'=>'FrontPageController@lecturerProfile',
                'as'=>'lecturer_profile_page'
            ]);

        Route::get('/forum/{id}',
            [
                'uses'=>'ForumController@forum',
                'as'=>'forum_page'
            ]);

        Route::post('/create-forum',
            [
                'uses'=>'ForumController@createForum',
                'as'=>'create_forum'
            ]);

        Route::post('/create-reply',
            [
                'uses'=>'ForumController@createReply',
                'as'=>'create_reply'
            ]);

        Route::get('/create-forum-like/{id}',
            [
                'uses'=>'ForumController@createForumLike',
                'as'=>'create_forum_like'
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

        Route::get('/coba5',
            [
                "uses"=>"CobaController@index5",
                "as"=>"coba_page_5"
            ]);

        Route::get('/coba6',
            [
                'uses'=>'CobaController@copyFile',
                'as'=>'copy_page'
            ]);

        Route::get('/coba7',
            [
                'uses'=>'CobaController@testVideo',
                'as'=>'test_video'
            ]);

        Route::get('/coba8',
            [
                'uses'=>'CobaController@subCourse',
                'as'=>'test_sub_course'
            ]);

        Route::get('/coba9',
            [
                'uses'=>'CobaController@increment',
                'as'=>'increment'
            ]);

        Route::post('/coba10',
            [
                'uses'=>'CobaController@createQuestion',
                'as'=>'coba_post_arraydata'
            ]);

        Route::get('/coba11',
            [
                'uses'=>'CobaController@forum',
                'as'=>'coba_forum_page'
            ]);

        Route::post('/coba12',
            [
                'uses'=>'CobaController@createForum',
                'as'=>'coba_create_forum'
            ]);

        Route::get('/coba13',
            [
                'uses'=>'CobaController@joinCourse',
                'as'=>'coba_join_course'
            ]);

        Route::get('/coba14',
            [
                'uses'=>'CobaController@cobaku',
                'as'=>'asdasdasdasdsa'
            ]);

        Route::get('/matter/{id}',
            [
                'uses'=>'MatterController@index',
                'as'=>'ajdiajisdasdj'
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

        Route::post('/update-course/{id}',
            [
                'uses'=>'LecturerController@updateCourse',
                'as'=>'lecturer_update_course'
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

        Route::post('/update-subcourse',
            [
                'uses'=>'LecturerController@updateSubCourse',
                'as'=>'lecturer_update_subcourse'

            ]);

        Route::get('/getSubCourses/{id}',
            [
                "uses"=>"CourseController@getSubCourses",
                "as"=>"get_sub_courses_data"
            ]);

        Route::get('/delete-subcourse/{id}',
            [
                'uses'=>'LecturerController@deleteSubCourse',
                'as'=>'delete_sub_course'
            ]);

        Route::get('/sub-course-detail/{id}',
            [
                'uses'=>'LecturerController@subCourseDetailContent',
                'as'=>'get_sub_course_detail_content'
            ]);

        Route::get('/delete-subcourse-detail/{id}',
            [
                'uses'=>'LecturerController@deleteSubCourseDetailContent',
                'as'=>'delete_sub_course_detail_content'
            ]);

        Route::post('/create-question',
            [
                'uses'=>'AssignmentController@createQuestion',
                'as'=>'lecturer_create_question'
            ]);


    });

    Route::group(['prefix'=>'/admin'],function (){

        Route::get('/',
            [
                'uses'=>'AdminController@dashboard',
                'as'=>'admin_dashboard_page'
            ]);

        Route::get('/course-category',
            [
                'uses'=>'AdminController@courseCategory',
                'as'=>'admin_course_category_page'
            ]);

        Route::post('/create-course-category',
            [
                'uses'=>'AdminController@createCourseCategory',
                'as'=>'admin_create_coursecategory'
            ]);

        Route::post('/update-course-category',
            [
                'uses'=>'AdminController@updateCourseCategory',
                'as'=>'admin_update_coursecategory'
            ]);

        Route::get('/delete-course-category/{id}',
            [
                'uses'=>'AdminController@deleteCourseCategory',
                'as'=>'admin_delete_coursecategory'
            ]);

        Route::post('/get-one-coursecategory',
            [
                'uses'=>'AdminController@getOneCourseCategory',
                'as'=>'admin_get_one_coursecategory'
            ]);

        Route::get('/get-course-category',
            [
                'uses'=>'AdminController@getCourseCategory',
                'as'=>'admin_course_category'
            ]);

        Route::get('/profile',
            [
                'uses'=>'AdminController@profile',
                'as'=>'admin_profile_page'
            ]);

        Route::post('/store-profile',
            [
                'uses'=>'AdminController@storeProfile',
                'as'=>'admin_store_profile'
            ]);

        Route::post('/store-password',
            [
                'uses'=>'AdminController@storePassword',
                'as'=>'admin_store_password'
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

        Route::post('/get-one-course',
            [
                'uses'=>'AdminController@getOneCourse',
                'as'=>'admin_get_onecourse'
            ]);

        Route::post('/update-course',
            [
                'uses'=>'AdminController@updateCourse',
                'as'=>'admin_update_course'
            ]);

        Route::get('/unconfirmed-course',
            [
                'uses'=>'CourseController@getUnconfirmedCourse',
                'as'=>'admin_get_unconfirmedcourse'
            ]);

        Route::get('/userStudent',
            [
                'uses'=>'AdminController@userStudent',
                'as'=>'admin_user_student_page'
            ]);

        Route::post('/create-student',
            [
                'uses'=>'AdminController@createStudent',
                'as'=>'admin_create_student'
            ]);

        Route::get('/getStudent',
            [
                'uses'=>'AdminController@getStudent',
                'as'=>'admin_get_student'
            ]);

        Route::post('get-student-one',
            [
                'uses'=>'AdminController@getStudentOne',
                'as'=>'admin_post_student_one'
            ]);

        Route::post('/update-student',
            [
                'uses'=>'AdminController@updateStudent',
                'as'=>'admin_update_student'
            ]);

        Route::get('/delete-student/{user_id}',
            [
                'uses'=>'AdminController@deleteStudent',
                'as'=>'admin_delete_student'
            ]);

        Route::get('/userLecturer',
            [
                'uses'=>'AdminController@userLecturer',
                'as'=>'admin_user_lecturer_page'
            ]);

        Route::post('/create-lecturer',
            [
                'uses'=>'AdminController@createLecturer',
                'as'=>'admin_create_lecturer'
            ]);

        Route::get('/getLecturer',
            [
                'uses'=>'AdminController@getLecturer',
                'as'=>'admin_get_lecturer'
            ]);

        Route::post('get-lecturer-one',
            [
               'uses'=>'AdminController@getLecturerOne',
               'as'=>'admin_post_lecturer_one'
            ]);

        Route::post('/update-lecturer',
            [
                'uses'=>'AdminController@updateLecturer',
                'as'=>'admin_update_lecturer'
            ]);

        Route::get('/delete-lecturer/{user_id}',
            [
                'uses'=>'AdminController@deleteLecturer',
                'as'=>'admin_delete_lecturers'
            ]);

        Route::get('/userAdmin',
            [
                'uses'=>'AdminController@userAdmin',
                'as'=>'admin_user_admin_page'
            ]);

        Route::get('/getAdmin',
            [
                'uses'=>'AdminController@getAdmin',
                'as'=>'admin_get_admin'
            ]);

        Route::post('/create-admin',
            [
                'uses'=>'AdminController@createAdmin',
                'as'=>'admin_create_admin'
            ]);

        Route::post('get-admin-one',
            [
                'uses'=>'AdminController@getAdminOne',
                'as'=>'admin_post_admin_one'
            ]);

        Route::post('/update-admin',
            [
                'uses'=>'AdminController@updateAdmin',
                'as'=>'admin_update_admin'
            ]);

        Route::get('/delete-admin/{user_id}',
            [
                'uses'=>'AdminController@deleteAdmin',
                'as'=>'admin_delete_admins'
            ]);



    });



});
