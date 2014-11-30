@extends('master')

@section('header')
    <h1>Users</h1>
@stop

@section('content')
    @foreach($users as $user)
    <div>
        <a href="{{url('user/'.$user->id)}}">
            <strong> {{{$user->name}}} </strong> - {{{$user->display_name}}} | {{{$user->gender}}}
        </a>
    </div>
    @endforeach
@stop