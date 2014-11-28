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
    return View::make('post')
        ->with('post', $post);
});

# Topic Link

Route::get('{topic}', function(Topic $topic)
{
	return View::make('topic')
		->with('topic', $topic);
});

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

Route::get('logout', array('uses' => 'UserController@doLogout'));



