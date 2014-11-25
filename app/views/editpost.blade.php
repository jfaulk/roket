@extends('master')

@section('header')
	<a href="{{('posts/'.$post->id.'')}}">&larr; Cancel </a>
	
	<h2>
		@if($method == 'post')
			New post
		@elseif($method == 'delete')
			Delete "{{$post->title}}"?
		@else
			Edit "{{$post->title}}"
		@endif
	</h2>
@stop

@section('content')
	{{Form::model($post, array('method' => $method, 'url'=>'posts/'.$post->id))}}
	
		@unless($method == 'delete')	
			<div class="form-group">
				{{Form::label('Title')}}
				{{Form::text('title')}}
			</div>
			
			<div class="form-group">
				{{Form::label('Text')}}
				{{Form::text('text')}}
			</div>
			
			<div class="form-group">
				{{Form::label('Topics')}}
				{{Form::text(topics)}}
			</div>
			
			<div class="form-group">
				{{Form::label('Content Tags')}}
				{{Form::text(content-tags)}}
			</div>
		
			{{Form::submit("Save", array("class"=>"btn btn-default"))}}
		@else
			{{Form::submit("Delete", array("class"=>"btn btn-default"))}}
		@endif
		
	{{Form::close()}}
@stop