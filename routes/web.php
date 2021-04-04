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

Route::get('/', "PostController@index");
Route::get('/posts', "PostController@post");
Route::get('/posts/{post}', "PostController@detail");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
Route::middleware('auth')->group(function(){
    Route::get('/', "PostController@index");
});

Auth::routes();*/