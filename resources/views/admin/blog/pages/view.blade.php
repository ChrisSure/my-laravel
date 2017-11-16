@extends('layouts.admin')


@section('content')
	<section class="content-header">
	    <h1>Перегляд - {{ $page->name }}</h1>
	    {!! Breadcrumbs::render('adminPagesView', $page) !!}
	</section>
	<section class="content">
		@if($page)
			<div class="box">
				<div class="box-body">
					<a href="{{ route('pagesEdit', ['id'=>$page->id]) }}" class="btn btn-primary">Редагувати</a>&nbsp;
					<a href="{{ route('pagesDelete', ['id'=>$page->id]) }}" class="btn btn-danger delete">Видалити</a>
					<hr/>
					<table class="table">
						<tr><td class="active">Ссилка</td><td>{{ $page->slug }}</td></tr>
						<tr><td class="active">Назва сторінки</td><td>{{ $page->name }}</td></tr>
						<tr><td class="active">Статус</td><td>{{ ($page->status) ? 'Опубліковано' : 'Чорновик' }}</td></tr>
						<tr><td class="active">Дата створення</td><td>{{ $page->created_at }}</td></tr>
						<tr><td class="active">Дата оновлення</td><td>{{ $page->updated_at }}</td></tr>
					</table>
				</div>
			</div>
			
			<div class="box">
				<div class="box-header with-border">Текст</div>
				<div class="box-body">
					{!! $page->text !!}
				</div>
			</div>
			
			<div class="box">
				<div class="box-header with-border">SEO</div>
				<div class="box-body">
					<table class="table">
						<tr><td class="active">Заголовок сторінки</td><td>{{ $page->title }}</td></tr>
						<tr><td class="active">Описання</td><td>{{ $page->description }}</td></tr>
						<tr><td class="active">Ключові слова</td><td>{{ $page->keywords }}</td></tr>
					</table>
				</div>
			</div>
		@else
			<p>Немає сторінки</p>
		@endif
	</section>
@endsection