@extends('auths.default')

@section('title', AppConstants::VIEW_TITLE)

@section('head')
<link rel="stylesheet" href="{{ asset('css/page/auths/_auths.css') }}">
@endsection

@section('header_title')
{{ AppConstants::VIEW_TITLE }}
@endsection

@section('content')
	<div class="container">
		<div class="contents">
			<div class="bg-secondary text-white p-3">ログイン</div>
			<div class="shadow-sm px-3 py-4 mb-5 bg-white rounded">
				@if(session('error'))
					<div class="alert alert-danger msg h6" role="alert">
							{!! session('error') !!}
					</div>
				@endif
				@if($errors->any())
					<div class="alert alert-danger msg h6" role="alert">
							<div class="font-weight-bold mb-3">{{ AppConstants::ERR_MSG_AUTH }}</div>
							<div class="small">
								@foreach($errors->all() as $error)
									@if($loop->last)
										{{ $error }}
									@else
										<p>{{ $error }}</p>
									@endif
								@endforeach
							</div>
					</div>
				@endif
				<form method="post" action="{{ url(AppConstants::KEY_AUTHS) }}">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="email">メールアドレス</label>
						<input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control"/>
					</div>
					<div class="form-group">
						<label for="password">パスワード</label>
						<input type="password" id="password" name="password" class="form-control"/>
					</div>
					<div class="mt-5">
						<input type="submit" value="ログイン" name="login" id="login" class="btn btn-primary btn-lg btn-block">
					</div>
					<a href="{{ url(AppConstants::ROOT_DIR_AUTHS_PRE_UPDATE) }}" class="d-inline-block mt-3">パスワードをお忘れですか？</a>
				</form>
			</div>
		</div>
</div>
@endsection
@section('script')

@endsection
