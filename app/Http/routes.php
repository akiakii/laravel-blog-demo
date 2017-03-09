<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//estrust test




Route::get('/', function () {
    return redirect('/blog');
});

Route::get('blog', 'BlogController@index');
Route::get('blog/{slug}', 'BlogController@showPost');
$router->get('contact', 'ContactController@showForm');
Route::post('contact', 'ContactController@sendContactInfo');
// Admin area
Route::get('admin', function () {
    return redirect('/admin/post');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('admin', function () {
    return redirect('/admin/post');
});
//Route::get('/admin/user', 'Admin\UserController@index');
Route::group(['namespace' => 'Admin', 'middleware' => 'auth','middleware'=>'admin'], function () {
    Route::resource('admin/post', 'PostController', ['except' => 'show']);
    Route::resource('admin/tag', 'TagController', ['except' => 'show']);
    Route::resource('admin/user', 'UserController', ['except' => 'show']);
    Route::get('admin/upload', 'UploadController@index');
});

// 注册
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');

// //upload
// // 在这一行下面
//Route::get('admin/upload', 'Admin\UploadController@index');

// // 上传
Route::post('admin/upload/file', 'Admin\UploadController@uploadFile');
Route::delete('admin/upload/file', 'Admin\UploadController@deleteFile');
Route::post('admin/upload/folder', 'Admin\UploadController@createFolder');
Route::delete('admin/upload/folder', 'Admin\UploadController@deleteFolder');
//用户
