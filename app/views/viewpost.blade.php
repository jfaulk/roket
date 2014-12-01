@extends('master')

@section('header')
	
@stop

@section('content')
    
	Topic Tags <br>
	{{ " | " }}
	@foreach($post->topics as $topic)
		{{ link_to('topic/' . $topic->id, $topic->tag)}}
		{{ " | " }}
	@endforeach<br><br>
	Content Tags<br>
	{{ " | " }}
	@foreach($post->content as $content)
		{{ link_to('content/' . $content->id, $content->tag)}}
		{{ " | " }}
	@endforeach<br>	<br>
	{{ "Author: " }}
	@foreach(User::where('id', '=', $post->user_id)->get() as $auth)@endforeach
	{{ link_to('user/'. $auth->id, $auth->name) }}
	<h1>
		{{$post->post_title}}
	</h1>
	{{$post->post_contents}}
	<hr>
	<a href="{{url('post/'.$post->id.'/edit')}}">
		<span class="glyphicon glyphicon-edit"></span> Edit
	</a>
	<a href="{{url('post/'.$post->id.'/delete')}}">
		<span class="glyphicon glyphicon-trash"></span> Delete
	</a>
	Last edited: {{$post->updated_at}}
	<br>
	<a href="{{url('/')}}">Back to dashboard</a>
@stop