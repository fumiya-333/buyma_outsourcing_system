@extends('layouts.default')

@section('title', AppConstants::VIEW_TITLE)

@section('head')
<link rel="stylesheet" href="{{ asset('css/page/auths/_auths.css') }}">
@endsection

@section('header_title')
{{ AppConstants::VIEW_TITLE }}
@endsection

@section('content')
	<div class="container py-4">
		<div class="contents">
			@if($msg)
				<div class="msg m-3 h6">
					<?= $msg ?>
				</div>
			@endif
		</div>
	</div>
@endsection
@section('script')
@endsection
