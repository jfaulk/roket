<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Roket</title>
		<link rel="stylesheet" href="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css')}}">
		<link rel="shortcut icon" type="image/x-icon" href="/public/favicon.ico">
	</head>
	
	<body>
		<div class="container">
			<div class="page-header">
				@yield('header')
				
				{{link_to('/', 'Home')}}
				{{link_to('/users', 'Users')}}
				{{link_to('/about', 'About Us')}}
				@if(Auth::check())
				    {{link_to('/user/{user}/edit', 'Edit your profile')}}
				    {{link_to('/logout', 'Logout')}}
				@else
				    {{link_to('/login', 'Login')}}
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