<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>

	<link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
	<link href="{{ asset( 'css/bootstrap.min.css' ) }}" rel="stylesheet" type="text/css">
	<link href="{{ asset( 'css/style.css' ) }}" rel="stylesheet" type="text/css"> 
	<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css"> 
	<link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">
 
	<script type="text/javascript" src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap-filestyle.min.js') }}"></script>
	{{--    filestyle --}}
</head>
<body>
	<header id="header_wrapper">
		@yield('header')

		@if(count($errors) > 0)
			<div class='alert alert-success'>
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		@if(session('status') > 0)
			<div class='alert alert-success'>
				{{ session('status') }}
			</div>
		@endif

	</header>
	@yield('content')

</body>
</html>