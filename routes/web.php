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
    return view('layouts.master');
})->name('home');
Route::prefix('student')->group(function () {
    Route::get('/', 'StudentController@index')->name('student.index');
    Route::get('/create', 'StudentController@create')->name('student.create');
    Route::post('/create', 'StudentController@store');
    Route::get('/edit/{id}', 'StudentController@edit')->name('student.edit');
    Route::post('/edit/{id}', 'StudentController@update');
    Route::get('/delete/{id}', 'StudentController@delete')->name('student.delete');
    Route::post('/delete/{id}', 'StudentController@destroy');
});

Route::prefix('class')->group(function () {
    Route::get('/', 'ClassController@index')->name('class.index');
    Route::get('/create', 'ClassController@create')->name('class.create');
    Route::post('/create', 'ClassController@store');
    Route::get('/edit/{id}', 'ClassController@edit')->name('class.edit');
    Route::post('/edit/{id}', 'ClassController@update');
    Route::get('/delete/{id}', 'ClassController@delete')->name('class.delete');
    Route::post('/delete/{id}', 'ClassController@destroy');
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

