<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ asset('css/_style.css') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@yield('head')
</head>
<body>
	@component('layouts.header')
		@slot('header_title')
			@yield('header_title')
		@endslot
		@slot('breadcrumbs')
			@yield('breadcrumbs')
		@endslot
	@endcomponent
	<div class="main">
		<div class="min-vh-100">
			@yield('content')
		</div>
	</div>
	@yield('script')
</body>
</html>
