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

Route::get('/', function()
{
	return View::make('index');
});

Route::get('users', function()
{
    $users = User::all();
    return View::make('users')
        ->with('users', $users);
});

Route::get('user/{user}', function(User $user)
{
    return View::make('viewprofile')
        ->with('user', $user);
});

Route::get('user/{user}/edit', function(User $user)
{
    return View::make('editprofile')
        ->with('user', $user)
        ->with('method', 'put');
});

Route::get('newaccount', function()
{
    return "TODO: Implement create new profile";
});

Route::get('login', array('uses' => 'HomeController@showLogin'));

Route::post('login', array('uses' => 'HomeController@doLogin'));

Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::get('about', function()
{
   return View::make('about');
});

Route::get('post/{post}', function(Post $post)
{
    return View::make('post')
        ->with('post',$post);
});