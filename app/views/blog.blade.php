@extends('master')

@section('header')
	<a href="{{url('/')}}">Back to dashboard</a>
	<h2>
		{{{$user->blog-title}}}
	</h2>
	<a href="{{url('users/'.$user->id.'/edit')}}">
		<span class="glyphicon glyphicon-edit"></span> Edit
	</a>
	<a href="{{url('users/'.$user->id.'/delete')}}">
		<span class="glyphicon glyphicon-trash"></span> Delete
	</a>
@stop

@section('content')
	<!-- get the user's posts and display them -->
@stop