<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title', 'Laravel')</title>

		{!! $html->style('http://fonts.googleapis.com/css?family=Lato:100') !!}
		@foreach($_assets->styles as $style){!! $html->style($style) !!}@endforeach
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

		@foreach($_assets->scripts as $script){!! $html->script($script) !!}@endforeach
		@yield('scripts')
	</body>
</html>
