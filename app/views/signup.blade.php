@extends('master')

@section('content')

<script type="text/javascript">
    $(function() {
        $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    });
</script>

	{{ Form::open(array('url' => 'signup')) }}
		<h1>Signup!</h1>

		<!-- show login errors here if exists -->
		<p>
			{{ $errors->first('name') }}
			{{ $errors->first('display_name') }}
			{{ $errors->first('email') }}
			{{ $errors->first('date_of_birth') }}
			{{ $errors->first('gender') }}
			{{ $errors->first('password') }}
		</p>

		<p>
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name') }}
		</p>

		<p>
			{{ Form::label('display_name', 'Display Name') }}
			{{ Form::text('display_name') }}
		</p>

		<p>
			{{ Form::label('email', 'Email Address') }}
			{{ Form::text('email') }}
		</p>

		<p>
			{{ Form::label('date_of_birth', 'Date of Birth', array('id' => '#datepicker')) }}
			{{ Form::text('date_of_birth') }}
		</p>

		<p>
			{{ Form::label('gender', 'Gender') }}
			{{ Form::text('gender') }}
		</p>

		<p>
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
		</p>

		<p>{{ Form::submit('Signup!') }}</p>
	{{ Form::close() }}
@stop
