@extends('layouts.admin')

@section('content')
	<section class="content-header">
	    <h1>Перегляд - {{ $security->ip }}</h1>
	    {!! Breadcrumbs::render('adminSecurityView', $security) !!}
	</section>
	<section class="content">
		@if($security)
			<div class="box">
				<div class="box-body">
					<a href="{{ route('securityEdit', ['id'=>$security->id]) }}" class="btn btn-primary">Редагувати</a>&nbsp;
					<a href="{{ route('securityDelete', ['id'=>$security->id]) }}" class="btn btn-danger delete">Видалити</a>
					<hr/>
					<table class="table">
						<tr><td class="active">IP</td><td>{{ $security->ip }}</td></tr>
						<tr><td class="active">Дата блокування</td><td>{{ date('Y-m-d, h:i:s',$security->created_at) }}</td></tr>
					</table>
				</div>
			</div>
		@else
			<p>Немає IP</p>
		@endif
	</section>
@endsection