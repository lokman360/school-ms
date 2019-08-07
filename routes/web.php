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

Route::get('/', function () {
    return view('admin.pages.index');
});

//  START STUDENT CONTROLLER HERE //
Route::resource('student', 'StudentController');
Route::resource('students/view', 'StudentController2');
//  END STUDENT CONTROLLER HERE //

//  START CLASS CONTROLLER HERE //
Route::resource('class', 'ClassController');
//  END STUDENT CONTROLLER HERE //

Route::get('/demo', function(){
    return view('admin.pages.student_page.demo');
});