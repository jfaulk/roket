@extends('master')

@section('header')

@stop

@section('content')
	<h1>{{ $topic->tag }}</h1>
	related posts:<br>
	@foreach($topic->posts as $post)
		<a href="{{ url('posts/' . $post->id) }}">{{ $post->name }}</a>
	@endforeach
	<hr>
@stop