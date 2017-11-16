@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>Кеш</h1>
	{!! Breadcrumbs::render('adminCache') !!}
</section>
<section class="content">
	<div class="box">
		<div class="box-body">
			<a href="{{ route('cache-clear') }}" class="btn btn-danger" style="margin-top: 20px;">Очистити кеш</a>
		</div>
	</div>
</section>
@endsection