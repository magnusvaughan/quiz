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

// Authentication Routes...
Route::auth();

//Quiz Routes
Route::group(['prefix' => 'quizzes'], function () {
    Route::get('/index', 'QuizController@index');
    Route::get('/create', 'QuizController@create');
    Route::post('/', 'QuizController@store');
    Route::get('/{quiz}', 'QuizController@show');
    Route::post('/{quiz}', 'QuizController@result');
    Route::delete('/{quiz}', 'QuizController@destroy');
});


Route::get('/home', 'HomeController@index');


Auth::routes();

Route::get('/home', 'HomeController@index');
