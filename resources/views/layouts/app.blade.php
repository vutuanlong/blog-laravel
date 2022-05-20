<!doctype html>
<html lang="en">
	<head>
		<title>Laravel From Scratch Blog</title>
		<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
		<!-- <link rel="preload" href="https://unpkg.com/bamboo.css@1.3.9/dist/light.min.css" as="style" onload="this.rel='stylesheet'"> -->
		<link rel="stylesheet" href="{{ url( 'app.css' ) }}">
	</head>

	<body style="font-family: Open Sans, sans-serif">
		<section class="px-6 py-8">
			@include( 'shared.header' )

			@yield( 'main' )

			@include( 'shared.footer' )
		</section>
	</body>
</html>