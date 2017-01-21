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

// Authentication Routes...
Route::auth();

Route::get('/home', 'HomeController@index');

//Quiz Routes
Route::group(['prefix' => 'quizzes'], function () {
    Route::get('/', 'QuizController@index');
    Route::get('/create', 'QuizController@create');
    Route::post('/', 'QuizController@store');
    Route::delete('/{quiz}', 'QuizController@destroy');
});