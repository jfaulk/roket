@extends('master')

@section('header')

@stop

@section('content')
    <div>
        {{{ Post::find($post->id)->user->name }}} <br>
        {{{ $post->created_at }}} <br><br>
        <h1> {{{ $post->title }}} </h1><br>
        {{{ $post->content }}} </strong><br>
    </div>
@stop