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

Route::group(['namespace' => 'risul\LaravelLikeComment\Controllers', 'prefix'=>'laravellikecomment', 'middleware' => 'web'], function (){
	Route::group(['middleware' => 'auth'], function (){
		Route::get('/like/vote', 'LikeController@vote');
		Route::get('/comment/add', 'CommentController@add');
	});
});