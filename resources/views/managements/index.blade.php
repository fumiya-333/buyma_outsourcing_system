<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>{{ AppConstants::VIEW_TITLE }}</title>
	<link rel="stylesheet" href="{{ asset('css/_style.css') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid">
				<span class="navbar-brand mr-5">{{ AppConstants::VIEW_TITLE }}</span>
				<div class="collapse navbar-collapse">
					@if(Auth::check())
						<ul class="nav navbar-nav ml-auto">
								<li class="nav-item active"><a class="nav-link" href="{{ url(AppConstants::ROOT_DIR_AUTHS_LOGOUT) }}">ログアウト</a></li>
						</ul>
					@else
						<ul class="nav navbar-nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="{{ url(AppConstants::ROOT_DIR_AUTHS_PRE_REGIST) }}">新規登録</a></li>
							<li class="nav-item active"><a class="nav-link" href="{{ url('') }}">ログイン</a></li>
						</ul>
					@endif
				</div>
			</div>
		</nav>
	</header>
	<div id="main" class="main bg-secondary">
		<div class="sidebar text-white">
			<ul class="nav navbar-nav">
				@foreach($menu_param_array as $array_key => $array)
						@if($array[1] == AppConstants::FG_ON)
								<li class="nav-item active bg-dark"><router-link to="{{ url($array_key) }}" class="nav-link text-white pl-4 @if($array_key == AppConstants::KEY_TOP) border-top border-secondary @endif">{{ $array[0] }}</router-link></li>
						@else
								<li class="nav-item"><a class="nav-link text-white pl-4 border-bottom border-dark" href="{{ url($array_key) }}">{{ $array[0] }}</a></li>
						@endif
				@endforeach
			</ul>
		</div>
		<div class="min-vh-100 right-view bg-white">
			<router-view/>
		</div>
	</div>
	<script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
