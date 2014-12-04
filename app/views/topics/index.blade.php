@extends('master')

@section('content')

<h1>All Topics</h1>
    <p>{{ link_to_route('topics.create', 'Add new topic') }}</p>
    @if ($topics->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Topic</th>
                <th>Date Created</th>
                <th>Posts</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($topics as $topic)
            <tr>
                <td><a href="{{ url('topics/' . $topic->id) }}">{{ $topic->name }}</a></td>
                <td>{{ $topic->created_at->toFormattedDateString() }}</td>
                <td>
                @foreach (Topic::find($topic->id)->posts as $post)
                    <a href="{{ url('posts/' . $post->id) }}">{{ $post->title }} </a>
                @endforeach
                </td>
                @if (Auth::check())
                <td>{{ link_to_route('topics.edit', 'Edit', array($topic->id), array('class' => 'btn btn-info')) }}</td>
                <td>
                    {{ Form::open(array('method' => 'DELETE', 'route' => array('topics.destroy', $topic->id))) }}
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