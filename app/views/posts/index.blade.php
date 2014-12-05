@extends('master')

@extends('header')

@section('content')

<h1>All Posts</h1>
    <p>{{ link_to_route('posts.create', 'Add new post') }}</p>
    @if ($posts->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Topics</th>
                <th>Date Created</th>
                <th>User</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <td><a href="{{ url('posts/' . $post->id) }}"> {{ $post->title }} </a></td>
                <td>
                    @foreach (Post::find($post->id)->topics as $topic)
                        <a href="{{ url('topics/' . $topic->id) }}"> {{ ' [' . $topic->name . '] ' }} </a>
                    @endforeach
                </td>
                <td>{{{ $post->created_at->toFormattedDateString() }}}</td>
                <td>{{{ Post::find($post->id)->user->name }}}</td>
                    @if (Auth::check() AND Auth::user()->id == Post::find($post->id)->user->id)
                        <td>{{ link_to_route('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-info')) }}</td>
                        <td>
                            {{ Form::open(array('method' => 'DELETE', 'route' => array('posts.destroy', $post->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                        </td>
                    @endif
            </tr>
        @endforeach
        </tbody>
</table>

<nav>
    {{ $posts->links() }}
</nav>

@else

<p>There are no posts.</p>

@endif

@stop