<?php

class PostsController extends \BaseController {

    protected $post;

    protected $user;

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
		$posts = Post::paginate(5);

        return View::make('posts.index', compact('posts'));
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
            $topics = Topic::lists('name', 'id');
            $contents = Content::lists('name', 'id');

            return View::make('posts.create', compact('topics', 'contents'));
        }
        else
        {
            return Redirect::route('posts.index')
                ->with('message', 'You must be logged in to post.');
        }

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $user = Auth::user();
        $input = Input::all();
        $topics = $input['topics'];
        $contents = $input['contents'];
        $validation = Validator::make($input, Post::$rules);
        if ($validation->passes())
        {
            $this->post->title = Input::get('title');
            $this->post->content = Input::get('content');
            $this->post->user_id = $user->id;

            if($this->post->save())
            {
                $this->post->topics()->sync($topics);
                $this->post->contents()->sync($contents);
                return Redirect::route('posts.index');
            }

            return Redirect::route('posts.index')->with('error', 'There was a problem creating a post.');
        }
        return Redirect::route('posts.create')
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
        $post = Post::find($id);

        return View::make('posts.post')
            ->with('post', $post);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $topics = Topic::lists('name', 'id');
        $contents = Content::lists('name', 'id');
        $postOwner = Post::find($id)->user_id;

        if(Auth::check() AND $postOwner == Auth::id())
        {
            $post = Post::find($id);
            if (is_null($post))
            {
                return Redirect::route('posts.index');
            }
            return View::make('posts.edit', compact('post', 'topics', 'contents'));
        }
        else
        {
            return Redirect::route('posts.index')
                ->with('message', 'Not allowed to edit other users posts.');
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
        $topics = $input['topics'];
        $contents = $input['contents'];
        $validation = Validator::make($input, Post::$rules);
        if ($validation->passes())
        {
            $post = Post::find($id);
            $post->update($input);
            $post->topics()->sync($topics);
            $post->contents()->sync($contents);
            return Redirect::route('posts.show', $id);
        }
        return Redirect::route('posts.edit', $id)
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
        $postOwner = Post::find($id)->user_id;

        if (Auth::check() AND $postOwner == Auth::id())
        {
            Post::find($id)->delete();
            return Redirect::route('posts.index');
        }
        else
        {
            return Redirect::route('posts.index', $id)
                ->with('message', 'Not allowed to delete other users posts.');
        }
	}
}
