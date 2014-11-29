@extends('master')

@section('header')

@stop

@section('content')
    <div>
        <strong>ID: </strong> {{{$user->id}}} <br>
        <strong>Name: </strong> {{{$user->name}}} <br>
        <strong>Display Name: </strong> {{{$user->display_name}}} <br>
        <strong>Email: </strong> {{{$user->email}}} <br>
        <strong>Gender: </strong> {{{$user->gender}}} <br>
        <strong>Date of Birth: </strong> {{{$user->date_of_birth}}} <br>
        <strong>Role ID: </strong> {{{$user->role_id}}} <br>
        <strong>Created At: </strong> {{{$user->created_at}}} <br>
        <strong>Updated At: </strong> {{{$user->updated_at}}} <br>
        <br>
        @if($user == Auth::user())
        <h4><a href="{{ URL::to('user/' . $user->id . '/edit') }}">Edit Profile</a></h4>
        @endif
    </div>


    <br><br>
    <div id='blog'>
        @foreach(Post::where('user_id', '=', $user->id)->get() as $barf)
			<hr>
			{{ " | " }}
			@foreach($barf->topics as $topic)
				{{ link_to('topic/' . $topic->id, $topic->tag)}}
				{{ " | " }}
			@endforeach
			<h1>
			{{ link_to('post/' . $barf->id, $barf->post_title) }}
			</h1>
			{{ $barf->post_contents . "<br>"}}
        @endforeach
    </div>
@stop