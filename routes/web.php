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

Route::get('/', 'AdminController@index');

//  START STUDENT CONTROLLER HERE //
Route::resource('student', 'StudentController');
Route::post('student/update', 'StudentController@update');
Route::get('student/deleteid/{id}', 'StudentController@destroy');
Route::post('student/class-wise-view', 'StudentController@classWiseView');
Route::post('student/quick-view/filter-student', 'StudentController@quickViewFilter');
//  END STUDENT CONTROLLER HERE //

//  START CLASS CONTROLLER HERE //
Route::resource('class', 'ClassController');
Route::post('class/update', 'ClassController@update');
Route::get('class/delete/{id}', 'ClassController@destroy');
//  END CLASS CONTROLLER HERE //

//  START SUBJECCT CONTROLLER HERE //
Route::resource('subject', 'SubjectController');
Route::post('subject/update', 'SubjectController@update');
Route::get('subject/delete/{id}', 'SubjectController@destroy');
//  END SUBJECCT CONTROLLER HERE //

//  START SECTION CONTROLLER HERE //
Route::resource('section', 'SectionController');
Route::post('section/update', 'SectionController@update');
Route::get('section/delete/{id}', 'SectionController@destroy');
Route::post('section/check-section', 'SectionController@checkSection');
Route::post('section/update/check-section', 'SectionController@checkUpdateSection');
//  END SECTION CONTROLLER HERE //

//  START EXAM CONTROLLER HERE //
Route::resource('exam', 'ExamController');
Route::post('exam/update', 'ExamController@update');
Route::get('exam/delete/{id}', 'ExamController@destroy');
Route::post('exam/check-exam', 'ExamController@checkExam');
Route::post('exam/check-session', 'ExamController@checkSession');
//  END EXAM CONTROLLER HERE //


// START DOWNLOAD CONTROLLER HERE //
Route::get('download', 'DownloadController@index');
Route::get('download/seatplan', 'DownloadController@seatplan');
Route::post('download/seatplan', 'DownloadController@seatplanView');
//--------------------------
Route::get('download', 'DownloadController@index');
Route::get('download/admitcard', 'DownloadController@admitCard');
Route::post('download/admitcard', 'DownloadController@admitCardView');
// END DOWNLOAD CONTROLLER HERE //

// START ACCOUNT CONTROLLER HERE //
Route::get('account','AccountController@index');
Route::get('account/income/addcategory','AccountController@incomeViewCat');
Route::post('account/income/add-category','AccountController@incomeAddCat');
Route::post('account/income/update-category','AccountController@incomeUpdateCat');
Route::get('account/income/delete-category/{id}','AccountController@incomeCatDestroy');


Route::get('account/income/addsubcategory','AccountController@incomeViewSubCat');
Route::post('account/income/add-sub-category','AccountController@incomeAddSubCat');
Route::post('account/income/update-sub-category','AccountController@incomeUpdateSubCat');
Route::get('account/income/delete-sub-category/{id}','AccountController@incomeSubCatDestroy');
Route::post('account/check-income-sub-cat','AccountController@incomeCheckSubCat');



Route::get('account/income/addincome','AccountController@addIncomeView');
Route::post('account/income/add-income','AccountController@addIncome');
Route::post('account/income/update-sub-category','AccountController@incomeUpdateSubCat');
Route::get('account/income/delete-sub-category/{id}','AccountController@incomeSubCatDestroy');


Route::get('account/income','AccountController@income');

// END ACCOUNT CONTROLLER HERE //



Route::get('/demo', function(){
    return view('admin.pages.student_page.demo');
});