@extends('master')

@extends('header')

@section('content')

<h1>All Content</h1>
    <p>{{ link_to_route('contents.create', 'Add new content') }}</p>
    @if ($contents->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Topic</th>
                <th>Date Created</th>
                <th>Posts</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($contents as $content)
            <tr>
                <td><a href="{{ url('contents/' . $content->id) }}">{{ $content->name }}</a></td>
                <td>{{ $topic->created_at->toFormattedDateString() }}</td>
                <td>
                @foreach (Content::find($content->id)->posts as $post)
                    <a href="{{ url('posts/' . $post->id) }}">{{ $post->title }} </a>
                @endforeach
                </td>
                @if (Auth::check())
                <td>{{ link_to_route('contents.edit', 'Edit', array($topic->id), array('class' => 'btn btn-info')) }}</td>
                <td>
                    {{ Form::open(array('method' => 'DELETE', 'route' => array('contents.destroy', $topic->id))) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
                @endif
            </tr>
        @endforeach
        </tbody>
</table>

@else
<p>There are no posts.</p>
@endif

@stop