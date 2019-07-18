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
Route::get('/', 'StudentController@index');
/**
 * faculty route
 */
Route::resource('faculties', 'FacultyController');
/**
 * student route
 */
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
Route::resource('marks','MarkController');

