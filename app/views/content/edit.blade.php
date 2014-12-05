@extends('master')

@extends('header')

@section('content')

<h1>Edit Content</h1>
    {{ Form::model($content, array('method' => 'PATCH', 'route' => array('contents.update', $content->id), 'class' => 'form')) }}

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