@extends('auths.default')

@section('title', AppConstants::VIEW_TITLE)

@section('head')
<link rel="stylesheet" href="{{ asset('css/page/auths/_auths.css') }}">
@endsection

@section('header_title')
{{ AppConstants::VIEW_TITLE }}
@endsection

@section('content')
	@if(session(AppConstants::KEY_MSG))
		<div class="alert alert-info msg m-3 h6" role="alert">
			<?= session(AppConstants::KEY_MSG) ?>
		</div>
	@endif
	@if(session(AppConstants::KEY_ERR))
		<div class="alert alert-danger msg m-3 h6" role="alert">
			<?= session(AppConstants::KEY_ERR) ?>
		</div>
	@endif
	@if($errors->any())
		<div class="alert alert-danger msg m-3 h6" role="alert">
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
	<div class="container py-4">
		<div class="contents">
			<div class="bg-secondary text-white p-3">新規登録</div>
			<div class="shadow-sm px-3 py-4 mb-5 bg-white rounded">
				<form method="post" action="preRegist">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="email">メールアドレス</label>
						<input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control @if(!empty($errors->first('email'))) is-invalid @endif"/>
					</div>
					<div class="form-group">
						<label for="password">パスワード</label>
						<input type="password" id="password" name="password" class="form-control  @if(!empty($errors->first('password'))) is-invalid @endif"/>
					</div>
					<div class="form-group">
						<label for="password_confirmation">パスワード（確認用）</label>
						<input type="password" id="password_confirmation" name="password_confirmation" class="form-control  @if(!empty($errors->first('password'))) is-invalid @endif"/>
					</div>
					<div class="mt-5">
						<input type="submit" value="新規登録" name="preRegist" id="preRegist" class="btn btn-primary btn-lg btn-block">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
@section('script')
@endsection
