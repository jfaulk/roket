@extends('master')

@section('header')

@stop

@section('content')

    <h1> {{{ Topic::find($topic->id)->name }}} </h1><br>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Post</th>
                <th>Date Created</th>
                <th>User</th>
            </tr>
        </thead>
        <tbody>
            @foreach (Topic::find($topic->id)->posts as $post)
                <tr>
                <td><a href="{{ url('posts/' . $post->id) }}">{{ $post->title }} </a></td>
                <td> {{ $post->created_at->toFormattedDateString() }}</td>
                <td> {{ $post->user->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop