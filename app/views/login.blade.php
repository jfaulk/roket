@extends('master')

@section('header')

<link rel="stylesheet" href="{{asset('css/forms.css')}}">

@stop

@section('content')
<div class="container">
	{{ Form::open(array('url' => 'login', 'class' => 'form')) }}
		<h2 class="form-heading">Login</h2>

		@if($errors->has('email'))
			<p class="error"> {{ $errors->first('email') }} </p>
		@endif
		<p>
			{{ Form::label('email', 'Email Address', array('class' => 'sr-only')) }}
			{{ Form::text('email', Input::old('email'), array('placeholder' => 'Email', 'class' => 'form-control')) }}
		</p>

		@if($errors->has('password'))
			<p class="error"> {{ $errors->first('password') }} </p>
		@endif
		<p>
			{{ Form::label('password', 'Password', array('class' => 'sr-only')) }}
			{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}
		</p>

		{{ Form::button('Login!', array('type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block')) }}
	{{ Form::close() }}
</div>

@stop
