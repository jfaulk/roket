<?php

class TopicsController extends \BaseController {


    public function __construct(Topic $topic)
    {
        parent::__construct();

        $this->topic = $topic;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $topics = Topic::all();

        return View::make('topics.index', compact('topics'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        if (Auth::check())
        {
            return View::make('topics.create');
        }

        else
        {
            return Redirect::route('topics.index')
                ->with('message', 'You must be logged in to create a topic.');
        }
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();
        $validation = Validator::make($input, Topic::$rules);
        if ($validation->passes())
        {
            $this->topic->name = Input::get('name');

            if($this->topic->save())
            {
                return Redirect::route('topics.index');
            }

            return Redirect::route('topics.index')->with('error', 'There was a problem creating a topic.');
        }
        return Redirect::route('topics.create')
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
        $topic = Topic::find($id);

        return View::make('topics.topic')
            ->with('topic', $topic);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        if(Auth::check())
        {
            $topic = Topic::find($id);
            if (is_null($topic))
            {
                return Redirect::route('topics.index');
            }
            return View::make('topics.edit', compact('topic'));
        }
        else
        {
            return Redirect::route('topics.index')
                ->with('message', 'Must be logged in.');
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
        $validation = Validator::make($input, Topic::$rules);
        if ($validation->passes())
        {
            $topic = Topic::find($id);
            $topic->update($input);
            return Redirect::route('topics.index');
        }
        return Redirect::route('topics.edit', $id)
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
        if (Auth::check())
        {
            Topic::find($id)->delete();
            return Redirect::route('topics.index');
        }
        else
        {
            return Redirect::route('topics.index', $id)
                ->with('message', 'You must be logged in.');
        }
	}
}
