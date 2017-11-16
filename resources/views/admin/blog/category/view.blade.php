@extends('layouts.admin')


@section('content')
	<section class="content-header">
	    <h1>Перегляд - {{ $category->name }}</h1>
	    {!! Breadcrumbs::render('adminCategoryView', $category) !!}
	</section>
	<section class="content">
		@if($category)
			<div class="box">
				<div class="box-body">
					<a href="{{ route('categoryEdit', ['id'=>$category->id]) }}" class="btn btn-primary">Редагувати</a>&nbsp;
					<a href="{{ route('categoryDelete', ['id'=>$category->id]) }}" class="btn btn-danger delete">Видалити</a>
					<hr/>
					<table class="table">
						<tr><td class="active">Ссилка</td><td>{{ $category->slug }}</td></tr>
						<tr><td class="active">Назва сторінки</td><td>{{ $category->name }}</td></tr>
						<tr>
							<td class="active">Батьківська категорія</td>
							<td>
								{{ (count($category->ancestors) > 0) ? $category->ancestors->last()->name : 'Категорія батьківська' }}
							</td>
						</tr>
						<tr><td class="active">Дата створення</td><td>{{ $category->created_at }}</td></tr>
						<tr><td class="active">Дата оновлення</td><td>{{ $category->updated_at }}</td></tr>
					</table>
				</div>
			</div>
			
			<div class="box">
				<div class="box-header with-border">SEO</div>
				<div class="box-body">
					<table class="table">
						<tr><td class="active">Заголовок сторінки</td><td>{{ $category->title }}</td></tr>
						<tr><td class="active">Описання</td><td>{{ $category->description }}</td></tr>
						<tr><td class="active">Ключові слова</td><td>{{ $category->keywords }}</td></tr>
					</table>
				</div>
			</div>
		@else
			<p>Немає категорії</p>
		@endif
	</section>
@endsection