@extends('master')

@section('header')
	<h1>Roket</h1>
	<h6>Blogging to infinity... and beyond!</h6>
@stop

@section('content')
    @if(Auth::check()) {{-- user is logged in --}}
    <h6>Welcome, {{{Auth::user()->display_name}}}</h6>
    @else
    {{ HTML::image('img/rockt.jpg', 'a picture', array('class' => 'thumbnail')) }}
    @endif

	{{-- @if user is logged in, show subscribed blogs --}}
	{{-- @else hide section --}}
@stop