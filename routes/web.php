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

Route::get('/','StudentController@index')->name('home');
Route::prefix('student')->group(function () {
    Route::get('/', 'StudentController@index')->name('student.index');
    Route::get('/create', 'StudentController@create')->name('student.create');
    Route::post('/create', 'StudentController@store');
    Route::get('/mark/{id}', 'StudentController@showMark')->name('student.mark');
    Route::get('/edit/{id}', 'StudentController@edit')->name('student.edit');
    Route::post('/edit/{id}', 'StudentController@update');
    Route::get('/delete/{id}', 'StudentController@delete')->name('student.delete');
    Route::post('/delete/{id}', 'StudentController@destroy');
});

Route::prefix('specialty')->group(function () {
    Route::get('/', 'SpecialtyController@index')->name('specialty.index');
    Route::get('/create', 'SpecialtyController@create')->name('specialty.create');
    Route::post('/create', 'SpecialtyController@store');
    Route::get('/edit/{id}', 'SpecialtyController@edit')->name('specialty.edit');
    Route::post('/edit/{id}', 'SpecialtyController@update');
    Route::get('/delete/{id}', 'SpecialtyController@delete')->name('specialty.delete');
    Route::post('/delete/{id}', 'SpecialtyController@destroy');
});

Route::prefix('faculty')->group(function () {
    Route::get('/', 'FacultyController@index')->name('faculty.index');
    Route::get('/create', 'FacultyController@create')->name('faculty.create');
    Route::post('/create', 'FacultyController@store');
    Route::get('/edit/{id}', 'FacultyController@edit')->name('faculty.edit');
    Route::post('/edit/{id}', 'FacultyController@update');
    Route::get('/delete/{id}', 'FacultyController@delete')->name('faculty.delete');
    Route::post('/delete/{id}', 'FacultyController@destroy');
});

Route::prefix('subject')->group(function () {
    Route::get('/', 'SubjectController@index')->name('subject.index');
    Route::get('/create', 'SubjectController@create')->name('subject.create');
    Route::post('/create', 'SubjectController@store');
    Route::get('/mark/{id}', 'SubjectController@showMark')->name('subject.mark');
    Route::get('/edit/{id}', 'SubjectController@edit')->name('subject.edit');
    Route::post('/edit/{id}', 'SubjectController@update');
    Route::get('/delete/{id}', 'SubjectController@delete')->name('subject.delete');
    Route::post('/delete/{id}', 'SubjectController@destroy');
});

Route::prefix('mark')->group(function () {
    Route::get('/', 'MarkController@index')->name('mark.index');
    Route::get('/create', 'MarkController@create')->name('mark.create');
    Route::post('/create', 'MarkController@store');
    Route::get('/edit/{id}', 'MarkController@edit')->name('mark.edit');
    Route::post('/edit/{id}', 'MarkController@update');
    Route::get('/delete/{id}', 'MarkController@delete')->name('mark.delete');
    Route::post('/delete/{id}', 'MarkController@destroy');
});

