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
	return View::make('hello');
});

Route::get('users', function()
{
    $users = User::all();
    return View::make('users.index')
        ->with('users', $users);
});

Route::get('user/{id}', function()
{
    $id = User::
    return View::make('blog.index')
        ->with
});

Route::get('user/{id}/create', function()
{

});

Route::get('about', function()
{
   return View::make('about');
});