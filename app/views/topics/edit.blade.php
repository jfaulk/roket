@extends('master')

@section('header')

<link rel="stylesheet" href="{{asset('css/forms.css')}}">

@stop

@section('content')

<h1>Edit Topic</h1>
    {{ Form::model($topic, array('method' => 'PATCH', 'route' => array('topics.update', $topic->id), 'class' => 'form')) }}

            <p>
                {{ Form::label('name', 'Topic:', array('class' => 'sr-only')) }}
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