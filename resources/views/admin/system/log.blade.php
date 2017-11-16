@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>Логи</h1>
	{!! Breadcrumbs::render('adminLog') !!}
</section>
<section class="content">
	<div class="box">
		<div class="box-body">
			<table class="table">
				@if($logs->isNotEmpty())
					<? $count = 1;?>
					@foreach($logs as $entry)
						@if($entry->level == 'info')
							<tr>
								<td>{{ $count }}</td>
								<td>{{ $entry->id }}</td>
								<td>{{ $entry->level }}</td>
								<td>{{ $entry->header }}</td>
								<td>{{ $entry->date }}</td>
								<td>{{ $entry->stack }}</td>
								<td>{{ $entry->filePath }}</td>
							</tr>
							<? $count++;?>
						@endif
					@endforeach
				@else
					<p>Немає логів в журналі</p>
				@endif
			</table>
			<a href="{{ route('log-clear') }}" class="btn btn-danger" style="margin-top: 20px;">Очистити логи</a>
		</div>
	</div>
</section>
@endsection