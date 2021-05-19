<div class="row mb-2">
	<div class="col-sm-12">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('admin::home') }}">Home</a></li>
			@foreach($breadcrumbs ?? [] as $index => $breadcrumb)
			@if($index + 1 < count($breadcrumbs))
			<li class="breadcrumb-item"><a href="{{ $breadcrumb['href'] ?? '#' }}">{!! $breadcrumb['text'] ?? '&nbsp;' !!}</a></li>
			@else
			<li class="breadcrumb-item active">{!! $breadcrumb['text'] ?? '&nbsp;' !!}</li>
			@endif
			@endforeach
		</ol>
	</div>
</div>
