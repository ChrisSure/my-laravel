@extends('layouts.admin')

@section('content')
	<section class="content-header">
	    <h1>Перегляд - Дозвіл -> {{ $perm->name }}</h1>
	    {!! Breadcrumbs::render('adminPermView', $perm) !!}
	</section>
	<section class="content">
		@if($perm)
			<div class="box">
				<div class="box-body">
					<a href="{{ route('permEdit', ['id'=>$perm->id]) }}" class="btn btn-primary">Редагувати</a>&nbsp;
					<a href="{{ route('permDelete', ['id'=>$perm->id]) }}" class="btn btn-danger delete">Видалити</a>
					<hr/>
					<table class="table">
						<tr><td class="active">Назва</td><td>{{ $perm->name }}</td></tr>
						<tr><td class="active">Опис</td><td>{{ $perm->description }}</td></tr>
						<tr><td class="active">Дата добавлення</td><td>{{ $perm->created_at }}</td></tr>
						<tr><td class="active">Дата оновлення</td><td>{{ $perm->updated_at }}</td></tr>
					</table>
				</div>
			</div>
		@else
			<p>Немає дозволу</p>
		@endif
	</section>
@endsection