<?php

class UserController extends BaseController {

    public function showSignup()
    {
        // show signup form
        return View::make('signup');
    }

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

    public function doLogout()
    {
        Auth::logout(); // log out
        return Redirect::to('/'); // go home
    }

    public function showEditProfile($user)
    {
        // make sure profile to edit belongs to currently logged in user
        if($user == Auth::user())
        {
            return View::make('editprofile')
                ->with('user', $user);
        }
        else
        {
            return Redirect::to('login');
        }
    }

    public function doEditProfile()
    {
        // load the currently logged in user
        $user = Auth::user()->all();

        // update the profile fields. should probably do some sanity testing here.
        $user->display_name = Input::get('display_name');
        $user->email = Input::get('email');
        $user->gender = Input::get('gender');

        // push the updated user object to the database.
        $user->push();

        return Redirect::to('/user/' . $user->id);
    }
}