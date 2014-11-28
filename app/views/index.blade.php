@extends('master')

@section('header')
	{{-- @if user is logged in, show their username and post button --}}
	{{-- @else show signup splash screen --}}
@stop

@section('content')
    {{ HTML::image('img/rockt.jpg', 'a picture', array('class' => 'thumb')) }}
	{{-- @if user is logged in, show subscribed blogs --}}
	{{-- @else hide section --}}
@stop