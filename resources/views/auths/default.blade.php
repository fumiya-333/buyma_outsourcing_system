<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>{{ AppConstants::VIEW_TITLE }}</title>
	<link rel="stylesheet" href="{{ asset('css/_style.css') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@yield('head')
</head>
<body>
	<div id="main" class="min-vh-100 d-flex align-items-center">@yield('content')</div>
	<script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
	@yield('script')
</body>
</html>
