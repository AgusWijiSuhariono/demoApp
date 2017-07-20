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
Route::auth();

Route::get('/home',function(){
	return view('welcome');
});

Route::get('/', function () {
	return view('welcome');
});
Route::group(['middleware' => 'web'], function() {
Route::get('/find-propinsi','RequestUrlController@findPropinsi');

Route::get('/data-table','DataTabelController@index');
Route::get('/data-table/data-author','DataTabelController@dataAuthor');
Route::get('/data-table/data-post','DataTabelController@dataPost');

	Route::group(['middleware' => ['auth']],function(){
		
		Route::get('site/form-mail','SiteController@formMail');
		Route::post('site/send-mail','SiteController@sendMail');
		Route::get('site/template','SiteController@template');
		Route::resource('site', 'SiteController');	

		Route::get('socket','SocketController@index');
		Route::get('sendmessage','SocketController@writemessage');
		Route::post('writemessage','SocketController@sendMessage');
		
		Route::resource('user', 'UserController');
	});
});

Route::resource('File', 'TbFileController');