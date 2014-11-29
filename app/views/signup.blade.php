@extends('master')

@section('header')

<link rel="stylesheet" href="{{asset('css/signup.css')}}">

@stop

@section('content')
<div class="container">
<script type="text/javascript">
    $(function() {
        $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    });
</script>
	{{ Form::open(array('url' => 'signup', 'class' => 'form-signup')) }}
		<h2 class="form-signup-heading">Signup!</h2>

		<!-- show login errors here if exists -->
		<p>
			{{ $errors->first('name') }}
			{{ $errors->first('display_name') }}
			{{ $errors->first('email') }}
			{{ $errors->first('date_of_birth') }}
			{{ $errors->first('gender') }}
			{{ $errors->first('password') }}
			{{ $errors->first('password_confirmation') }}
		</p>

		<p>
		    {{ Form::label('name', 'Name', array('class' => 'sr-only')) }}
			{{ Form::text('name', Input::old('name'), array('placeholder' => 'Name', 'class' => 'form-control')) }}
		</p>

		<p>
		    {{ Form::label('display_name', 'Display Name', array('class' => 'sr-only')) }}
			{{ Form::text('display_name', Input::old('display_name'), array('placeholder' => 'Display Name', 'class' => 'form-control')) }}
		</p>

		<p>
		    {{ Form::label('email', 'Email', array('class' => 'sr-only')) }}
			{{ Form::text('email', Input::old('email'), array('placeholder' => 'Email', 'class' => 'form-control')) }}
		</p>

		<p>
		    {{ Form::label('date_of_birth', 'Date of Birth', array('class' => 'sr-only')) }}
			{{ Form::text('date_of_birth', Input::old('date_of_birth'), array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'Date of Birth', 'id' => 'datepicker')) }}
		</p>

		<p>
		    {{ Form::label('gender', 'Gender', array('class' => 'sr-only')) }}
			{{ Form::text('gender', Input::old('gender'), array('placeholder' => 'Gender', 'class' => 'form-control')) }}
		</p>

		<p>
		    {{ Form::label('password', 'Password', array('class' => 'sr-only')) }}
			{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}
		</p>

		<p>
		    {{ Form::label('password_confirmation', 'Password Confirmation', array('class' => 'sr-only')) }}
			{{ Form::password('password_confirmation', array('placeholder' => 'Confirm Password', 'class' => 'form-control')) }}
		</p>

		<p>
		    {{ Form::button('Signup!', array('type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block')) }}
		</p>
	{{ Form::close() }}
</div>
@stop

