@extends('master')

@section('header')

<link rel="stylesheet" href="{{asset('css/forms.css')}}">

@stop

@section('content')
<div class="container">
    {{ Form::open(array('route' => 'posts.store', 'class' => 'form')) }}
        <h2 class="form-heading">Create Post</h2>

            <p>
                {{ Form::label('title', 'Title:', array('class' => 'sr-only')) }}
                {{ Form::text('title', Input::old('title'), array('placeholder' => 'Title', 'class' => 'form-control')) }}
            </p>

            <p>
                {{ Form::label('content', 'Content:', array('class' => 'sr-only')) }}
                {{ Form::textarea('content', Input::old('content'), array('placeholder' => 'Content', 'class' => 'form-control')) }}
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

</div>

@stop