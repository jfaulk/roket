<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showLogin()
	{
        // show login form
		return View::make('login');
	}

    public function doLogin()
    {
        // create rules for login
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3|max:64' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run rules
        $validator = Validator::make(Input::all(), $rules);

        // redirect back to login if validation fails
        if ($validator->fails())
        {
            return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }

        else
        {
            $userdata = array(
                'email' 	=> Input::get('email'),
                'password' 	=> Input::get('password')
            );

            // attempt the login
            if (Auth::attempt($userdata))
            {
                // login SUCCESSFUL go to dashboard
                return Redirect::to('/');
            }

            else
            {
                //login FAILED return to login form
                return Redirect::to('login');
            }
        }
    }
}
