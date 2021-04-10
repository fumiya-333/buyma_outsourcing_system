@extends('layouts.default')

@section('title', AppConstants::VIEW_TITLE)

@section('head')
<link rel="stylesheet" href="{{ asset('css/page/studys/_studys.css') }}">
@endsection

@section('header_title')
{{ AppConstants::VIEW_TITLE }}
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render(AppConstants::ROOT_DIR_STUDYS_LIST) }}
@endsection

@section('content')
	<div class="container py-4">
		<div class="contents">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<th scope="col">コンサル生限定コンテンツ</th>
				</thead>
				<tbody>
					@foreach($content_steps as $content_step)
						<tr class="table-info">
							<th>{{$content_step->step_name}}</th>
						</tr>
						@foreach($contents as $content)
							@if($content->step_id == $content_step->step_id)
								<tr class="bg-white">
									<td><a href='{{ asset('/') . AppConstants::ROOT_DIR_STUDYS_DETAIL . '/' . $content->contents_id }}'> － {{$content->contents_name}}</a></td>
								</tr>
							@endif
						@endforeach
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
@section('script')
@endsection
