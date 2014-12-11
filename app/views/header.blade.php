@section('header')

<br>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="{{ url('/') }}" class="navbar-brand">Roket</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('users') ? 'active' : '' }}">{{ link_to('users', 'Users') }}</li>
                    {{ Request::is('users') ? '<span class="sr-only">(current)</span>' : '' }}

        <li class="{{ Request::is('posts*') ? 'active' : '' }}">{{ link_to('posts', 'Posts') }}</li>
                    {{ Request::is('posts*') ? '<span class="sr-only">(current)</span>' : '' }}

        <li class="{{ Request::is('topics*') ? 'active' : '' }}">{{ link_to('topics', 'Topic Tags') }}</li>
                    {{ Request::is('topics*') ? '<span class="sr-only">(current)</span>' : '' }}

        <li class="{{ Request::is('contents*') ? 'active' : '' }}">{{ link_to('contents', 'Content Tags') }}</li>
                    {{ Request::is('contents**') ? '<span class="sr-only">(current)</span>' : '' }}

        <li class="{{ Request::is('about*') ? 'active' : '' }}">{{ link_to('about', 'About Us') }}</li>
                    {{ Request::is('about*') ? '<span class="sr-only">(current)</span>' : '' }}
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"  aria-expanded="false">
                {{ Auth::user()->display_name }}<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('users/' . Auth::user()->id . '/edit') }}">Edit Profile</a></li>
               <li class={{ Request::is('logout*') ? 'active' : '' }}>{{ link_to('logout', 'Logout') }}</li>
              </ul>
            </li>
        @else
            <li class={{ Request::is('login*') ? 'active' : '' }}>{{ link_to('login', 'Login') }}</li>
            <li class={{ Request::is('users/create') ? 'active' : '' }}>{{ link_to('users/create', 'Signup!') }}</li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>

@stop
