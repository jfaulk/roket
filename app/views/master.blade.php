<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Roket</title>
		<link rel="stylesheet" href="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css')}}">
	</head>
	
	<body>
		<div class="container">
			<div class="page-header">
				@yield('header')
				
				{{link_to('/', 'Home')}}
				{{link_to('/users', 'Users')}}
				{{link_to('/about', 'About Us')}}
				{{link_to('/login', 'Login')}}
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