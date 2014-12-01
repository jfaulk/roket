@extends('master')

@section('header')

@stop

@section('content')
	<h1>{{ $content->tag }}</h1>
	related posts:<br>
	@foreach($content->posts as $post)
		{{ link_to('post/' . $post->id, $post->post_title) }}
	@endforeach
	<hr>
@stop