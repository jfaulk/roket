<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Roket</title>
		<link rel="stylesheet" href="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{url('https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css')}}">
		<link rel="stylesheet" href="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css')}}">
		<script type="text/javascript" src="{{url('https://code.jquery.com/jquery-1.11.1.min.js')}}"></script>
		<script type="text/javascript" src="{{url('https://code.jquery.com/ui/1.11.2/jquery-ui.min.js')}}"></script>
		<script type="text/javascript" src="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js')}}"></script>
		<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
	</head>
	
	<body>
		<div class="container">
				@yield('header')
			
			@if(Session::has('message'))
			
			<div class="alert alert-danger">
				{{Session::get('message')}}
			</div>
			@endif

			@yield('content')
		</div>
	</body>
</html>