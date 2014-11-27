@extends('master')

@section('header')

{{link_to('/', 'Home')}}

@section('content')

@foreach($users as $user)
<div>
<a href="{{url('user/'.$user->id)}}"><strong> {{{$user->name}}} </strong> - {{{$user->display_name}}} | {{{$user->gender}}}</a>
</div>
@endforeach
@stop