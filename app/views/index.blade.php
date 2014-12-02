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
            <?php
                $subscribed = DB::table('followee_user')
                    ->where('user_id', '=', Auth::user()->id)
                    ->get();
                $postsOut = DB::table('posts')
                    ->orderBy('id', 'desc')
                    ->whereIn('user_id', $subscribed)
                    ->take('10')
                    ->get();
            ?>

            @foreach ($postsOut as $barf)
                <div id="post">
                    <h2>{{{ $barf->post_title }}}</h2>
                    {{{ $barf->post_contents }}}
                </div>
            @endforeach
        </div>
    @else
        {{ HTML::image('img/rockt.jpg', 'a picture', array('class' => 'thumbnail')) }}
    @endif
@stop