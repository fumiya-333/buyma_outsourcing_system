@extends('layouts.default')

@section('title', AppConstants::VIEW_TITLE)

@section('head')
<link rel="stylesheet" href="{{ asset('css/page/studys/_studys.css') }}">
@endsection

@section('header_title')
{{ AppConstants::VIEW_TITLE }}
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render(AppConstants::ROOT_DIR_STUDYS_DETAIL, $content) }}
@endsection

@section('content')
	<div id="main" class="container py-4">
		<div class="contents">
				<div class="w-100">
					<div class="bg-dark text-white p-3">{{ $content->contents_name }}</div>
					<div class="bg-white">
						<div class="h6 pt-3 px-4 position-relative">
							{{ $content->contents_id }} / {{ $contents->count() }}
							<span class="video_page_trans">
								@if($content->contents_id != 1)
									<a class="mr-2 text-decoration-none" href="{{ url(AppConstants::ROOT_DIR_STUDYS_DETAIL . '/' . ($content->contents_id - 1)) }}"><i class="fas fa-angle-double-left text-primary"></i>&nbsp;&nbsp;前へ</a>
								@endif
								@if($content->contents_id != $contents->count())
									<a class="ml-2 text-decoration-none" href="{{ url(AppConstants::ROOT_DIR_STUDYS_DETAIL . '/' . ($content->contents_id + 1)) }}">次へ&nbsp;&nbsp;<i class="fas fa-angle-double-right text-primary"></i></a>
								@endif
							</span>
						</div>
						@if(!empty($content->youtube_video_id) || !$content_files->isEmpty())
						<div class="row p-4">
							@if(!empty($content->youtube_video_id))
							<div class="col">
									<iframe width="600px" height="355" src="https://www.youtube.com/embed/{{ $content->youtube_video_id }}" allowfullscreen></iframe>
							</div>
							@endif
							@if(!$content_files->isEmpty())
							<div class="col">
								<li class="list-group-item bg-dark text-white">資料（ダウンロード）</li>
								@foreach($content_files as $content_file)
									@if($loop->last)
										<li class="list-group-item border-bottom">
									@else
										<li class="list-group-item">
									@endif
										<a href="" @click.prevent.stop="download('{{ $content_file->file_path }}')">{{ $content_file->file_name }}</a>&nbsp;&nbsp;<i class="fas fa-file-download text-primary"></i>
									</li>
								@endforeach
							</div>
							@endif
						</div>
						<hr>
						@endif
						@if(!empty($content->contents_text))
							<div class="p-4">
								{!! $content->contents_text !!}
							</div>
						@endif
					</div>
			</div>
		</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript" src="{{ asset('js/page/studys/detail.js') }}"></script>
@endsection
