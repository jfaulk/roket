<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Roket</title>
		<link rel="stylesheet" href="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{url('//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css')}}">
		<link rel="script" href="{{url('//code.jquery.com/jquery-1.11.0.min.js')}}">
		<link rel="script" href="{{url('//code.jquery.com/ui/1.11.2/jquery-ui.js')}}">
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
	</head>
	
	<body>
		<div class="container">
			<div class="page-header">
				@yield('header')
				
				{{ link_to('/', 'Home |') }}
				{{ link_to('users', 'Users |') }}
				{{ link_to('about', 'About Us |') }}
				@if(Auth::check())
				    {{ link_to('logout', 'Logout |') }}
				    {{ link_to('user/' . Auth::user()->id, 'Profile') }}
				@else
				    {{ link_to('login', 'Login |') }}
				    {{ link_to('signup', 'Signup!') }}
				@endif
			</div>
			
			@if(Session::has('message'))
			
			<div class="alert alert-success">
				{{Session::get('message')}}
			</div>
			@endif
			@yield('content')
		</div>
	<body>
</html>