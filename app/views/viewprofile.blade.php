@extends('master')

@section('header')

{{link_to('/users', 'Back to the user list')}}

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
<strong>Updated At: </strong> {{{$user->updated_at}}}

</div>
@stop