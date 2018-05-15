<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'AdminController@adminMainPage');
Route::get('/student', 'StudentController@studentMainPage');
Route::get('/viewCoursesAvailable', 'StudentController@viewCoursesAvailable');
Route::post('/viewCoursesAvailable', 'StudentController@viewCoursesAvailable');
Route::get('/viewAllCourses', 'StudentController@viewAllCourses');
Route::post('/viewAllCourses', 'StudentController@viewAllCourses');

Route::post('/getQuota','StudentController@getQuota');
Route::post('getCourseHour','StudentController@getCourseHour');


Route::post('/hasClass','StudentController@timeHasClass');
Route::post('/getStuHour','StudentController@getStuHour');


Route::get('/updatePage','StudentController@updatePage');

Route::post('/addCourse','StudentController@addCourse');

Route::get('/dropCourse','StudentController@dropCourse');

Route::get('/', 'loginController@index');

Route::get('/index','loginController@viewIndexHtml');
Route::post('/login','loginController@login');

Route::get('/adminIndex','admin_controller@adminIndex');
Route::post('/delete','admin_controller@deleteStuData');

Route::get('registration','create_Controller@index');
Route::post('registration',['uses'=>'create_Controller@getStuData']);

Route::post('updateStuData','admin_controller@updateStuPage');
Route::post('update','admin_controller@update');

Route::get('logout','loginController@logout');
Route::get('ajax', "rsscontroller@loaddata");

Route::get('/studentProfile', 'StudentController@studentProfile');
