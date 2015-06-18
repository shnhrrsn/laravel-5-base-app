<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title', 'Laravel')</title>

		{!! HTML::style('http://fonts.googleapis.com/css?family=Lato:100') !!}
		@yield('styles')
	</head>
	<body>
		@yield('content.before')

		<div class="container">
			<div class="content">
				@yield('content')
			</div>
		</div>

		@yield('content.after')

		@yield('scripts')
	</body>
</html>
