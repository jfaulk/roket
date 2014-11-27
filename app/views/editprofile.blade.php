@extends('master')

@section('header')
	<a href="{{('user/' . $user->id )}}">&larr; Cancel</a>
	
	<h2>
		Edit {{$user->name}}'s profile
	</h2>
@stop

@section('content')
	{{Form::model($user, array('method' => $method, 'url'=>'posts/'.$post->id))}}
		<div class="form-group">
			{{Form::label('Blog Title')}}
			{{Form::text('blog-title')}}
		</div>
		
		<div class="form-group">
			{{Form::label('Email')}}
			{{Form::text('email')}}
		</div>
		
		<div class="form-group">
			{{Form::label('Date of Birth')}}
			{{Form::text('birthday')}}
		</div>
		
		<div class="form-group">
			{{Form::label('Gender')}}
			{{Form::text('gender')}}
		</div>
	{{Form::close()}}
@stop