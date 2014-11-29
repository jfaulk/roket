@extends('master')

@section('header')
	
@stop

@section('content')
    {{ "Author: " }}
	@foreach(User::where('id', '=', $post->user_id)->get() as $auth)@endforeach
	{{ link_to($auth->name, $auth->name) }}
	<h1>
		{{$post->post_title}}
	</h1>
	{{$post->post_contents}}
	<hr>
	<a href="{{url('posts/'.$post->id.'/edit')}}">
		<span class="glyphicon glyphicon-edit"></span> Edit
	</a>
	<a href="{{url('posts/'.$post->id.'/delete')}}">
		<span class="glyphicon glyphicon-trash"></span> Delete
	</a>
	Last edited: {{$post->updated_at}}
	<br>
	<a href="{{url('/')}}">Back to dashboard</a>
@stop