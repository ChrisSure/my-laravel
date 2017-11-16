@extends('layouts.admin')


@section('content')
	<section class="content-header">
	    <h1>Додати категорію</h1>
	    {!! Breadcrumbs::render('adminCategoryAdd') !!}
	</section>
	<section class="content">
	{!! Form::open(['url' => route('categoryAdd'), 'method'=>'POST']) !!}
		<div class="box">
			<div class="box-body">
			    <div class="form-group">
			        {!! Form::label('name', 'Назва') !!}
			        {!! Form::text('name', old('name'), ['class' => 'form-control','placeholder'=>'Введіть назву сторінки'])!!}
			    </div>
			        
			    <div class="form-group">
			        {!! Form::label('slug', 'Ссилка') !!}
			        {!! Form::text('slug', old('slug'), ['class' => 'form-control','placeholder'=>'Введіть ссилку сторінки'])!!}
			    </div>
			        
			     <div class="form-group">
			        {!! Form::label('parent_id', 'Батьківська категорія') !!}
						<select name="parent_id" style="width: 100%; height: 35px;">
							<option value=0>Батьківська</option>;
							<? 	
								$traverse = function ($categories, $prefix = '--') use (&$traverse) {
				    				foreach ($categories as $category) {
				        				echo '<option value='. $category->id .'>' . PHP_EOL.$prefix.' '.$category->name . '</option>';
				        				$traverse($category->children, $prefix.'----');
				    				}
								};
								$traverse($category);
							?>
						</select>
				</div>		    
			</div>
		</div>
		
		<div class="box">
			<div class="box-header with-border">SEO</div>
			<div class="box-body">
				<div class="form-group">
			        {!! Form::label('title','Заголовок') !!}
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
			{!! Form::button('Додати', ['class' => 'btn btn-success','type'=>'submit']) !!}
		</div>
					
		{!! Form::close() !!}
	</section>
@endsection