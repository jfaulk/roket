<?php

class UserController extends BaseController {

    public function showSignup()
    {
        // show signup form
        return View::make('signup');
    }

    public function doSignup()
    {
        $rules = array(
            'name'                  => 'required|alpha',
            'display_name'          => 'required',
            'email'                 => 'required|email',
            'date_of_birth'         => 'required',
            'password'              => 'required|alphaNum|min:6|max:64|confirmed',
            'password_confirmation' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return Redirect::to('signup')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }

        else
        {
            $userData = array(
                'name'                  => Input::get('name'),
                'display_name'          => Input::get('display_name'),
                'email'                 => Input::get('email'),
                'date_of_birth'         => Input::get('date_of_birth'),
                'gender'                => Input::get('gender'),
                'password'              => Input::get('password'),
                'role_id'               => 1
            );

            $newUser = User::create($userData);

            if ($newUser)
            {
                Auth::login($newUser);
                return Redirect::to('/user/' . Auth::user()->id);
            }

            return Redirect::to('signup')
                ->withInput(Input::except('password'));
        }
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
            'password' => 'required'
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
            $userData = array(
                'email' 	=> Input::get('email'),
                'password' 	=> Input::get('password')
            );

            // attempt the login
            if (Auth::attempt($userData))
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

    public function showEditProfile()
    {
        // make sure profile to edit belongs to currently logged in user
        if(Auth::user())
        {
            return View::make('editprofile')
                ->with('user', Auth::user());
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

        return Redirect::to('/user/' . Auth::user()->id);
    }
}