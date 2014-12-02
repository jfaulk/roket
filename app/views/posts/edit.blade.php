@extends('master')

@section('content')
<div class="'container">

<h1>Edit Post</h1>
    {{ Form::model($post, array('method' => 'PATCH', 'route' => array('posts.update', $post->id), 'class' => 'form')) }}

            <p>
                {{ Form::label('title', 'Title:', array('class' => 'sr-only')) }}
                {{ Form::text('title', Input::old('title'), array('placeholder' => 'Title', 'class' => 'form-control')) }}
            </p>
            <p>
                {{ Form::label('content', 'Content:', array('class' => 'sr-only')) }}
                {{ Form::textarea('content', Input::old('content'), array('placeholder' => 'Content', 'class' => 'form-control')) }}
            </p>
            <p>
                {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary btn-block')) }}
                {{ link_to_route('posts.show', 'Cancel', $post->id, array('class' => 'btn btn-lg btn-default btn-block')) }}
            </p>

    {{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

</div>

@stop