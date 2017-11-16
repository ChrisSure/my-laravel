@extends('layouts.admin')

@section('content')
	<section class="content-header">
	    <h1>Редагування - {{ $pages['name'] }}</h1>
	    {!! Breadcrumbs::render('adminPagesEdit', $pages) !!}
	</section>
	<section class="content">
	{!! Form::open(['url' => route('pagesEdit', ['id'=>$pages['id']]), 'method'=>'POST']) !!}
		<div class="box">
			<div class="box-body">
				<div class="form-group">
					{!! Form::label('slug','Назва')   !!}
					{!! Form::text('slug', $pages['slug'], ['class' => 'form-control', 'placeholder'=>'Введіть назву сторінки'])!!}
				</div>
					
				<div class="form-group">
					{!! Form::label('name','Назва')   !!}
					{!! Form::text('name', $pages['name'], ['class' => 'form-control', 'placeholder'=>'Введіть назву сторінки'])!!}
				</div>
					
				<div class="form-group">
					{!! Form::label('text', 'Текст:') !!}
					{!! Form::textarea('text', $pages['text'], ['id' => 'editor1', 'class' => 'form-control', 'placeholder'=>'Введіть текст сторінки']) !!} 
				</div>
					
				<div class="form-group">
					{!! Form::label('status', 'Показати:') !!}
						@if($pages['status'])
							<input type="checkbox" value="1" name="status" checked=""/>
						@else
							<input type="checkbox" value="1" name="status"/>
						@endif
				</div>
				
				<script>
				    var editor = CKEDITOR.replace( 'editor1',{
				        filebrowserBrowseUrl : '/elfinder/ckeditor' 
				    });
				</script>
			</div>
		</div>
		
		<div class="box">
			<div class="box-header with-border">SEO</div>
			<div class="box-body">
				<div class="form-group">
					{!! Form::label('title', 'Заголовок')   !!}
					{!! Form::text('title', $pages['title'], ['class' => 'form-control', 'placeholder'=>'Введіть назву сторінки'])!!}
				</div>

				<div class="form-group">
					{!! Form::label('description', 'Опис:') !!}
					{!! Form::textarea('description', $pages['description'], ['class' => 'form-control', 'rows' =>3, 'placeholder'=>'Введіть опис сторінки']) !!}
				</div>
							    
				<div class="form-group">
					{!! Form::label('keywords', 'Ключові слова:') !!} 
					{!! Form::text('keywords', $pages['keywords'], ['class' => 'form-control', 'placeholder'=>'Введіть ключові слова']) !!}
				</div>
			</div>
		</div>
		
		<div class="form-group">
			{!! Form::button('Зберегти', ['class' => 'btn btn-success', 'type'=>'submit']) !!}
		</div>
		
	{!! Form::close() !!}
	</section>
@endsection