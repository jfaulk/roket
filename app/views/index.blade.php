@extends('master')

@extends('header')

@section('content')
    @if(Auth::check()) {{-- user is logged in --}}
        <h6>Welcome, {{{Auth::user()->display_name}}}</h6>
        <p> {{ link_to_route('posts.create', 'Create a new post?')}} </p>
        <hr>
        <div id="dashposts">
            <?php
                $subscribed = DB::table('followee_user')
                    ->select('followee_id')
                    ->where('user_id', '=', Auth::user()->id)
                    ->get();
                $poop = array();
                foreach($subscribed as $bums)
                {
                    array_push($poop, $bums->followee_id);
                }

                $posts = DB::table('posts')
                    ->orderBy('id','desc')
                    ->whereIn('user_id', $poop)
                    ->take('10')
                    ->get();
                foreach($posts as $barf)
                {
                    //var_dump($barf);
                    echo '<div class="post">';
                        echo '<h2>' . $barf->title . '</h2>';
                        echo '<div>' . $barf->content . '</div>';
                        echo '<h6>Author: ' . User::find($barf->user_id)->display_name
                            . '</h6>';
                    echo '</div>';
                }
            ?>


        </div>
    @else
        {{ HTML::image('img/roket.jpg', 'Roket', array('class' => 'img-responsive, center-block')) }}
    @endif
@stop