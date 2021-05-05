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

//test
Route::get('/test', function (){
    $test = ['id' => 1, 'name' => 'メールの確認']; 
    event(new MessageCreated($test));
});

//PostController
Route::get('/', 'PostController@index');
Route::get('/posts', 'PostController@post')->middleware('auth');
Route::get('/posts/create', 'PostController@create')->middleware('auth');
Route::get('/posts/mypage', 'PostController@mypage')->middleware('auth');
Route::get('/posts/mypage/profile_edit', 'PostController@profile_edit')->middleware('auth');
Route::get('/posts/mypage/request_conf', 'PostController@request_conf')->middleware('auth');
Route::get('/posts/myposts', 'PostController@myposts')->middleware('auth');
Route::get('/posts/rooms', 'PostController@show_rooms')->middleware('auth');
Route::get('/posts/{post}', 'PostController@detail')->middleware('auth');
Route::get('/posts/{post}/mypost', 'PostController@mypost')->middleware('auth');
Route::get('/posts/{post}/mypost/edit', 'PostController@myedit')->middleware('auth');
Route::get('/posts/{post}/edit', 'PostController@edit')->middleware('auth');
Route::get('/posts/detail/host_profile/{user}', 'PostController@host_profile')->middleware('auth');

Route::post('/posts/mypage', 'PostController@image_upload');
Route::post('/posts', 'PostController@store');
Route::post('/posts/{post}/request', 'PostController@join_request');
Route::put('/posts/mypage', 'PostController@profile_update');
Route::put('/posts/mypage/request_approval/{join_request}', 'PostController@request_approval');
Route::put('/posts/{post}', 'PostController@update');
Route::delete('/posts/{post}', 'PostController@delete');
Route::delete('/posts/mypage/request_disapproval/{join_request}', 'PostController@request_disapproval');

//ChatController
Route::get('/posts/rooms/{post}/room', 'ChatController@talk_room')->middleware('auth');

//Ajax\ChatController
Route::get('ajax/chat', 'Ajax\ChatController@index'); // メッセージ一覧を取得
Route::post('ajax/chat', 'Ajax\ChatController@create'); // チャット登録

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
