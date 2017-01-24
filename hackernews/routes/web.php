<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles/{articles}/upvote', 'ArticleController@upvote')->name('articles.upvote');
Route::get('/articles/{articles}/downvote', 'ArticleController@downvote')->name('articles.downvote');
Route::get('/comments/{articles}/index', 'CommentController@index')->name('comments.index');
Route::resource('/articles', 'ArticleController');
Route::resource('/comments', 'CommentController', ['except' => ['index']]);