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

# Users List

Route::get('users', function()
{
    $users = User::all();
    return View::make('users')
        ->with('users', $users);
});

# User Profile

Route::get('user/{user}', function(User $user)
{
    return View::make('viewprofile')
        ->with('user', $user);
});

# User Post

Route::get('post/{post}', function(Post $post)
{
    return View::make('viewpost')
        ->with('post', $post);
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

# Edit Post

Route::get('post/{post}/edit', array('uses' => 'PostController@showEditPost'));
Route::post('post/{post}/edit', array('before' => 'csrf', 'uses' => 'PostController@doEditPost'));

# Edit User Profile

Route::get('user/{user}/edit', array('uses' => 'UserController@showEditProfile'));
Route::post('user/{user}/edit', array('before' => 'csrf', 'uses' => 'UserController@doEditProfile'));

# Site Registration

Route::get('signup', array('before' => 'guest', 'uses' => 'UserController@showSignup'));
Route::post('signup', array('before' => 'csrf', 'uses' => 'UserController@doSignup'));

# Login

Route::get('login', array('before' => 'guest', 'uses' => 'UserController@showLogin'));
Route::post('login', array('before' => 'csrf', 'uses' => 'UserController@doLogin'));

# Logout

Route::get('logout', array('before' => 'auth', 'uses' => 'UserController@doLogout'));
