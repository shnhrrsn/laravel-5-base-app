<html>
	<head>
		{!! HTML::style('http://fonts.googleapis.com/css?family=Lato:100') !!}
		{!! HTML::style(asset_path('scss/welcome.scss')) !!}
	</head>
	<body>
		<div class="container">
			<div class="content">
				@yield('content')
			</div>
		</div>
	</body>
</html>
