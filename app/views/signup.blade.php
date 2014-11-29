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
<div class="form-signup">
	{{ Form::open(array('url' => 'signup', 'class' => 'form-signup')) }}
		<h2 class="form-signup-heading">Signup!</h2>

		    @if($errors->has('name'))
		    <p class="error"> {{ $errors->first('name') }} </p>
		    @endif
		    <p>
		    {{ Form::label('name', 'Name', array('class' => 'sr-only')) }}
			{{ Form::text('name', Input::old('name'), array('placeholder' => 'Name', 'class' => 'form-control')) }}
            </p>

		    @if($errors->has('display_name'))
		    <p class="error"> {{ $errors->first('display_name') }} </p>
		    @endif
		    <p>
		    {{ Form::label('display_name', 'Display Name', array('class' => 'sr-only')) }}
			{{ Form::text('display_name', Input::old('display_name'), array('placeholder' => 'Display Name', 'class' => 'form-control')) }}
		    </p>

		    @if($errors->has('email'))
		    <p class="error"> {{ $errors->first('email') }} </p>
		    @endif
		    <p>
		    {{ Form::label('email', 'Email', array('class' => 'sr-only')) }}
			{{ Form::text('email', Input::old('email'), array('placeholder' => 'Email', 'class' => 'form-control')) }}
		    </p>

		    @if($errors->has('date_of_birth'))
		    <p class="error"> {{ $errors->first('date_of_birth') }} </p>
		    @endif
		    <p>
		    {{ Form::label('date_of_birth', 'Date of Birth', array('class' => 'sr-only')) }}
			{{ Form::text('date_of_birth', Input::old('date_of_birth'), array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'Date of Birth', 'id' => 'datepicker')) }}
		    </p>

		    <p>
		    @if($errors->has('gender'))
		    <p class="error"> {{ $errors->first('gender') }} </p>
		    @endif
		    {{ Form::label('gender', 'Gender', array('class' => 'sr-only')) }}
			{{ Form::text('gender', Input::old('gender'), array('placeholder' => 'Gender', 'class' => 'form-control')) }}
		    </p>

		    <p>
		    @if($errors->has('password'))
		    <p class="error"> {{ $errors->first('password') }} </p>
		    @endif
		    {{ Form::label('password', 'Password', array('class' => 'sr-only')) }}
			{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}
		    </p>

		    <p>
		    @if($errors->has('password_confirmation'))
		    <p class="error"> {{ $errors->first('password_confirmation') }} </p>
		    @endif
		    {{ Form::label('password_confirmation', 'Password Confirmation', array('class' => 'sr-only')) }}
			{{ Form::password('password_confirmation', array('placeholder' => 'Confirm Password', 'class' => 'form-control')) }}
		    </p>

		    {{ Form::button('Signup!', array('type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block')) }}
		
	{{ Form::close() }}
</div>
</div>
@stop

