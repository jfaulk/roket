<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::model('user', 'User');
Route::model('post','Post');
Route::model('topic', 'Topic');
Route::model('content', 'Content');

# Index Page

Route::get('/', function()
{
	return View::make('index');
});

# About Page

Route::get('about', function()
{
    return View::make('about');
});

# Topic Link

Route::get('topic/{topic}', function(Topic $topic)
{
	return View::make('viewtopic')
		->with('topic', $topic);
});

# Content Link

Route::get('content/{content}', function(Content $content)
{
	return View::make('viewcontent')
		->with('content', $content);
});

# Create New Post
Route::post('blog/{user}/create', function(User $user)
    {
        return View::make('newpost')
            ->with('user', $user);
    });

# Login

Route::get('login', array('before' => 'guest', 'uses' => 'UsersController@showLogin'));
Route::post('login', array('before' => 'csrf', 'uses' => 'UsersController@getLogin'));

# Logout

Route::get('logout', array('before' => 'auth', 'uses' => 'UsersController@getLogout'));


Route::resource('users', 'UsersController');
Route::resource('posts', 'PostsController');
Route::resource('topics', 'TopicsController');