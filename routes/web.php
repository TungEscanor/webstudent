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
Route::group(['namespace' => 'Auth'],function () {
    Route::get('register','RegisterController@getRegister')->name('get.register');
    Route::post('register','RegisterController@postRegister')->name('post.register');

    Route::get('login','LoginController@getLogin')->name('get.login');
    Route::post('login','LoginController@postLogin')->name('post.login');
});

Route::get('/', 'StudentController@index');
/**
 * faculty route
 */
Route::resource('faculties', 'FacultyController');
/**
 * student route
 */
Route::get('email/{email}/sendEmail','sendEmail@student')->name('email.students');
Route::get('students/badStudents','StudentController@badStudents')->name('students.bad');
Route::get('students/{id}/create_mark','StudentController@createMarks')->name('students.createMarks');
Route::resource('students', 'StudentController');

/**
 * class route
 */
Route::resource('classes', 'ClassController');
/**
 * subject route
 */
Route::resource('subjects', 'SubjectController');
/**
 * mark route
 */
Route::post('marks/store','MarkController@storeMore')->name('marks.storeMore');
Route::resource('marks','MarkController');
Route::get('marks/destroy/{id}','MarkController@destroy')->name('mark.post.destroy');

