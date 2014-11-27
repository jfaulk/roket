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

Route::get('user/{id}', function($id)
{
    $user = User::find($id);
    return View::make('viewprofile')
        ->with('user', $user);
});

Route::get('user/{id}/create', function()
{
    return "TODO: Implement create new post";
});

Route::get('login', function()
{
    return "TODO: Implement user login";
});

Route::get('about', function()
{
   return View::make('about');
});