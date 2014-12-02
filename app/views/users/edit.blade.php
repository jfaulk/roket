@extends('master')

@section('header')

<link rel="stylesheet" href="{{asset('css/forms.css')}}">

<script type="text/javascript">
    $(function() {
        $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    });
</script>

@stop

@section('content')
<div class="container">
   {{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id), 'class' => 'form')) }}
		<h2 class="form-heading">Edit User</h2>

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
			{{ Form::select('gender', array('Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'), null, array('class' => 'btn btn-default dropdown-toggle', 'data-toggle' => 'dropdown')) }}
			</p>

			<p>
			{{ Form::label('password', 'Password', array('class' => 'sr-only')) }}
			{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}
			</p>

			<p>
			{{ Form::label('password_confirmation', 'Password Confirmation', array('class' => 'sr-only')) }}
			{{ Form::password('password_confirmation', array('placeholder' => 'Confirm Password', 'class' => 'form-control')) }}
			</p>

			{{ Form::button('Edit', array('type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block')) }}
    {{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<p class="bg-danger">:message</p>')) }}
    </ul>
@endif

</div>

@stop