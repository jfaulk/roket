@extends('master')

@section('header')
	<a href="{{url('/')}}">Back to dashboard</a>
	<h1>
		{{{$post->name}}}
	</h1>
	<a href="{{url('posts/'.$post->id.'/edit')}}">
		<span class="glyphicon glyphicon-edit"></span> Edit
	</a>
	<a href="{{url('posts/'.$post->id.'/delete')}}">
		<span class="glyphicon glyphicon-trash"></span> Delete
	</a>
	Last edited: {{$post->updated_at}}
@stop

@section('content')
    {{{"Author: " . User::find($post->user_id)->get()}}}
	{{$post->post_content}}
@stop