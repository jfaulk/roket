@extends('master')

@section('header')

    {{link_to('/users', 'Users')}}

	{{-- @if user is logged in, show their username and post button --}}
	{{-- @else show signup splash screen --}}
@stop

@section('content')
	{{-- @if user is logged in, show subscribed blogs --}}
	{{-- @else hide section --}}
@stop