@extends('layouts.admin')


@section('content')
	<section class="content-header">
	    <h1>Додати сторінку</h1>
	    {!! Breadcrumbs::render('adminPagesAdd') !!}
	</section>
	<section class="content">
	{!! Form::open(['url' => route('pagesAdd'), 'method'=>'POST']) !!}
		<div class="box">
			<div class="box-body">
			    <div class="form-group">
			        {!! Form::label('name', 'Назва') !!}
			        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder'=>'Введіть назву сторінки'])!!}
			        {{--
			        @if ($errors->has('name'))
					  {{ $errors->first('name') }}
					@endif
					--}}
			    </div>
			        
			    <div class="form-group">
			        {!! Form::label('slug', 'Ссилка') !!}
			        {!! Form::text('slug', old('slug'), ['class' => 'form-control', 'placeholder'=>'Введіть ссилку сторінки'])!!}
			    </div>
			        
			    <div class="form-group">
					{!! Form::label('text', 'Текст:',['class'=>'control-label']) !!}
					{!! Form::textarea('text', old('text'), ['id' => 'editor1', 'class' => 'form-control', 'placeholder'=>'Введіть текст сторінки']) !!}
				</div>
					
				<div class="form-group">
					{!! Form::label('status', 'Показати:') !!}
					{!! Form::checkbox('status') !!}
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
			        {!! Form::label('title', 'Заголовок') !!}
			        {!! Form::text('title',old('title'),['class' => 'form-control', 'placeholder'=>'Введіть заголовок сторінки'])!!}
			    </div>
							
				<div class="form-group">
					{!! Form::label('description', 'Опис:') !!}
					{!! Form::textarea('description', old('description'), ['class' => 'form-control', 'rows' => 3, 'placeholder'=>'Введіть опис сторінки']) !!}
				</div>
							    
				<div class="form-group">
					{!! Form::label('keywords', 'Ключові слова:') !!}
					{!! Form::text('keywords', old('keywords'),['class' => 'form-control', 'placeholder'=>'Введіть ключові слова']) !!}
				</div>
			</div>
		</div>
		
		<div class="form-group">
			{!! Form::button('Додати', ['class' => 'btn btn-success', 'type'=>'submit']) !!}
		</div>
		
	{!! Form::close() !!}
	</section>
@endsection