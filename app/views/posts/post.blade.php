@extends('master')

@extends('header')

@section('content')
        {{{ Post::find($post->id)->user->name }}} <br>

        {{{ $post->created_at->toFormattedDateString() }}} <br><br>

        <h1> {{{ $post->title }}} </h1><br>
        {{{ $post->content }}} <br>
    </div>
</div>
@stop