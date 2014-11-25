@extends('master')

@section('header')
	<a href="{{url('/')}}">Back to dashboard</a>
	<h2>
		{{{$post->name}}}
	</h2>
	<a href="{{url('posts/'.$post->id.'/edit')}}">
		<span class="glyphicon glyphicon-edit"></span> Edit
	</a>
	<a href="{{url('posts/'.$post->id.'/delete')}}">
		<span class="glyphicon glyphicon-trash"></span> Delete
	</a>
	Last edited: {{$post->updated_at}}
@stop

@section('content')
	{{{$post->content}}}
@stop