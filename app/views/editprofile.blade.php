@extends('master')

@section('header')

<link rel="stylesheet" href="{{asset('css/forms.css')}}">

@stop

@section('content')
<div class="container">
	{{ Form::model($user, array('url' => '/user/' . $user->id . '/edit', 'class' => 'form')) }}
		<h2 class="form-heading">Edit Profile</h2>

		<p>
			{{ Form::label('display_name', 'Display Name', array('class' => 'sr-only')) }}
			{{ Form::text('display_name', Input::old('display_name'), array('placeholder' => 'Display Name', 'class' => 'form-control')) }}
		</p>

		<p>
			{{ Form::label('email', 'Email', array('class' => 'sr-only')) }}
			{{ Form::text('email', Input::old('email'), array('placeholder' => 'Email', 'class' => 'form-control')) }}
		</p>

		<p>
			{{ Form::label('gender', 'Gender', array('class' => 'sr-only')) }}
			{{ Form::text('gender', Input::old('gender'), array('placeholder' => 'Gender', 'class' => 'form-control')) }}
		</p>

		{{ Form::button('Submit!', array('type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block')) }}
	{{ Form::close() }}
</div>
@stop