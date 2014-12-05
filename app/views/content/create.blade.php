@extends('master')

@section('header')

<link rel="stylesheet" href="{{asset('css/forms.css')}}">

@stop

@section('content')

    {{ Form::open(array('route' => 'contents.store', 'class' => 'form')) }}
        <h2 class="form-heading">Create Topic</h2>

            <p>
                {{ Form::label('name', 'Content:', array('class' => 'sr-only')) }}
                {{ Form::text('name', Input::old('name'), array('placeholder' => 'Name', 'class' => 'form-control')) }}
            </p>

            <p>
                {{ Form::submit('Submit', array('class' => 'btn btn-lg btn-primary btn-block')) }}
            </p>

    {{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop