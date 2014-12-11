<?php

class ContentsController extends \BaseController {

    public function __construct(Content $content)
    {
        parent::__construct();

        $this->content = $content;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $contents = Content::all();

        return View::make('contents.index', compact('contents'));
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
            return View::make('contents.create');
        }

        else
        {
            return Redirect::route('contents.index')
                ->with('message', 'You must be logged in to create a content tag.');
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
        $validation = Validator::make($input, Content::$rules);
        if ($validation->passes())
        {
            $this->content->name = Input::get('name');

            if($this->content->save())
            {
                return Redirect::route('contents.index');
            }

            return Redirect::route('contents.index')->with('error', 'There was a problem creating a content tag.');
        }
        return Redirect::route('contents.create')
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
        $content = Content::find($id);

        return View::make('contents.content')
            ->with('content', $content);
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
            $content = Content::find($id);
            if (is_null($content))
            {
                return Redirect::route('contents.index');
            }
            return View::make('contents.edit', compact('contents'));
        }
        else
        {
            return Redirect::route('contents.index')
                ->with('message', 'You must be logged in to edit a content tag');
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
        $validation = Validator::make($input, Content::$rules);
        if ($validation->passes())
        {
            $content = Content::find($id);
            $content->update($input);
            return Redirect::route('contents.index');
        }
        return Redirect::route('contents.edit', $id)
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
            Content::find($id)->delete();
            return Redirect::route('contents.index');
        }
        else
        {
            return Redirect::route('contents.index', $id)
                ->with('message', 'You must be logged in to delete a content tag.');
        }
	}
}