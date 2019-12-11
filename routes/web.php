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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/save-post', 'PostController@store');
Route::post('/save-teacher', 'TeacherController@store');
Route::get('/get-post', 'PostController@index');

Route::get('/teacher', 'TeacherController@index');
Route::get('/teachers', 'TeacherController@teacher');