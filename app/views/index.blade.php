@extends('master')

@section('header')
	<h1>Roket</h1>
	<h6>Blogging to infinity... and beyond!</h6>
@stop

@section('content')
    @if(Auth::check()) {{-- user is logged in --}}
        <h6>Welcome, {{{Auth::user()->display_name}}}</h6>
        <hr>
        <div id="dashposts">
            @foreach(/* post from a subscribed blog */)
                <div id="post">
                    <h2>{{-- post title --}}</h2>
                    {{-- post contents --}}
                </div>
            @endforeach
        </div>
    @else
        {{ HTML::image('img/rockt.jpg', 'a picture', array('class' => 'thumbnail')) }}
    @endif
@stop