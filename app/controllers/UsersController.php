<?php

class UsersController extends \BaseController {


    public function __construct(Post $post, User $user)
    {
        parent::__construct();

        $this->post = $post;
        $this->user = $user;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = User::all();

        return View::make('users.index', compact('users'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();
        $validation = Validator::make($input, User::$rules);
        if ($validation->passes())
        {
            $newUser = User::create($input);
            Auth::login($newUser);
            return Redirect::route('users.index');
        }
        return Redirect::route('users.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $user = User::find($id);

		return View::make('users.user')
            ->with('user', $user);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        if(Auth::check() AND $id == Auth::id())
            {
                $user = User::find($id);
                if (is_null($user))
                {
                    return Redirect::route('users.index');
                }
                return View::make('users.edit', compact('user'));
            }
            else
            {
                return Redirect::route('users.index')
                    ->with('message', 'Not allowed to edit other users.');
            }
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $input = Input::all();
        $validation = Validator::make($input, User::rules($id));
        if ($validation->passes())
        {
            $user = User::find($id);
            $user->update($input);
            return Redirect::route('users.show', $id);
        }
        return Redirect::route('users.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        if ($id == Auth::user()->id)
        {
            User::find($id)->delete();
            return Redirect::route('users.index');
        }
        else
        {
            return Redirect::route('posts.index', $id)
                ->with('error', 'Not allowed to delete other users.');
        }
	}

    public function showLogin()
    {
        // show login form
        return View::make('users.login');
    }

    public function getLogin()
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

    public function getLogout()
    {
        Auth::logout(); // log out
        return Redirect::to('/'); // go home
    }


}
