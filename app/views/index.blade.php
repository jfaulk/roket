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
                    ->select('followee_id')
                    ->where('user_id', '=', Auth::user()->id)
                    ->get()
                    ;
                $poop = array();
                foreach($subscribed as $bums)
                {
                    array_push($poop, $bums->followee_id);
                }

                $posts = DB::table('posts')
                    ->orderBy('id','desc')
                    ->whereIn('user_id', $poop)
                    ->get();
                foreach($posts as $barf)
                {
                    //var_dump($barf);
                    echo '<div class="post">';
                        echo '<h2>' . $barf->post_title . '</h2>';
                        echo '<div>' . $barf->post_contents . '</div>';
                        echo '<h6>Author: ' . User::find($barf->user_id)->display_name
                            . '</h6>';
                    echo '</div>';
                }
            ?>


        </div>
    @else
        {{ HTML::image('img/rockt.jpg', 'a picture', array('class' => 'thumbnail')) }}
    @endif
@stop