<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* ================== student ================== */
Route::get('/student', 'StudentController@index');

/* ================== course ================== */
Route::get('/student/course', 'CourseController@index');


/* ================== Homepage + Admin Routes ================== */

require __DIR__.'/admin_routes.php';
