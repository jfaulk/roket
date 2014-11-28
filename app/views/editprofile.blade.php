@extends('master')

@section('header')

@stop

@section('content')
	{{ Form::open(array('url' => '/user/' . $user->id . '/edit')) }}
		<h1>Edit Profile</h1>

		<p>
			{{ Form::label('display_name', 'Display Name') }}
			{{ Form::text('display_name', Input::old('display_name')) }}
		</p>

		<p>
			{{ Form::label('email', 'Email') }}
			{{ Form::text('email', Input::old('email')) }}
		</p>

		<p>
			{{ Form::label('gender', 'Gender') }}
			{{ Form::text('gender', Input::old('gender')) }}
		</p>

		<p>{{ Form::submit('Submit!') }}</p>
	{{ Form::close() }}
@stop