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
    Route::get('register','RegisterController@showRegistrationForm');
    Route::post('register','RegisterController@register');

    Route::get('login','LoginController@showLoginForm ');
    Route::post('login','LoginController@login');
});

Auth::routes();
Route::group(['middleware' => 'auth'],function () {
    Route::get('/', 'StudentController@index');
    /**
     * faculty route
     */
    Route::resource('faculties', 'FacultyController');
    /**
     * student route
     */
    Route::get('email/{email}/sendEmail', 'StudentController@mailStudent')->name('students.sendEmail');
    Route::get('email/sendAll', 'StudentController@sendAll')->name('students.sendAll');
    Route::get('students/badStudents', 'StudentController@badStudents')->name('students.bad');
    Route::get('students/{id}/create_mark', 'StudentController@createMarks')->name('students.createMarks');
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
    Route::post('marks/store', 'MarkController@storeMore')->name('marks.storeMore');
    Route::resource('marks', 'MarkController');
    Route::get('marks/destroy/{id}', 'MarkController@destroy')->name('mark.post.destroy');


    Route::get('logout', 'Auth\LoginController@logout')->name('get.logout');
    Route::get('/home', 'HomeController@index')->name('home');
});
