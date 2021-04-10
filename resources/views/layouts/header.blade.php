<header>
	<div class="header">
		<h1 class="h6 font-weight-bold">{{ $header_title }}</h1>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			@if(Auth::check())
				<ul class="nav navbar-nav">
					<li class="nav-item active"><a class="nav-link" href="{{ url(AppConstants::ROOT_DIR_STUDYS_LIST) }}">トップ</a></li>
				</ul>
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
	</nav>
	{{ $breadcrumbs }}
</header>
