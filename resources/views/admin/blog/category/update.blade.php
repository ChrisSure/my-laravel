@extends('layouts.admin')

@section('content')
	<section class="content-header">
	    <h1>Редагування - {{ $category['name'] }}</h1>
	    {!! Breadcrumbs::render('adminCategoryEdit', $category) !!}
	</section>
	<section class="content">
	{!! Form::open(['url' => route('categoryEdit', ['id'=>$category['id']]), 'method'=>'POST']) !!}
		<div class="box">
			<div class="box-body">
				<div class="form-group">
					{!! Form::label('name', 'Назва')   !!}
					{!! Form::text('name', $category['name'], ['class' => 'form-control', 'placeholder'=>'Введіть назву категорії'])!!}
				</div>
					
				<div class="form-group">
					{!! Form::label('slug', 'Ссилка')   !!}
					{!! Form::text('slug', $category['slug'], ['class' => 'form-control', 'placeholder'=>'Введіть ссилку категорії'])!!}
				</div>
					
				<div class="form-group">
			        {!! Form::label('parent_id', 'Батьківська категорія') !!}
						<select name="parent_id" style="width: 100%; height: 35px;">
							<option value=0>Батьківська</option>;
							<? 	$traverse = function ($categories, $prefix = '--') use (&$traverse, $category) { ?>
				    			<? foreach ($categories as $cats): ?>
				        			<option value="<?=$cats->id;?>" 
				        				<? if ($cats->id == $category['parent_id']): ?>
				        					<? echo 'selected';?>
				        				<? endif ?>
				        				> <?=PHP_EOL.$prefix.' '.$cats->name;?></option>;
				        			<? $traverse($cats->children, $prefix.'----'); ?>
				    			<? endforeach; ?>
							<? }; ?> 
							<? $traverse($cat); ?>
						</select>
				</div>
			</div>
		</div>
		
		<div class="box">
			<div class="box-header with-border">SEO</div>
			<div class="box-body">
				<div class="form-group">
					{!! Form::label('title', 'Назва')   !!}
					{!! Form::text('title', $category['title'], ['class' => 'form-control', 'placeholder'=>'Введіть заголовок категорії'])!!}
				</div>

				<div class="form-group">
					{!! Form::label('description', 'Опис:') !!}
					{!! Form::textarea('description', $category['description'], ['class' => 'form-control', 'rows' => 3, 'placeholder'=>'Введіть опис категорії']) !!}
				</div>
							    
				<div class="form-group">
					{!! Form::label('keywords', 'Ключові слова:') !!} 
					{!! Form::text('keywords', $category['keywords'], ['class' => 'form-control', 'placeholder'=>'Введіть ключові слова']) !!}
				</div>
			</div>
		</div>
		
		<div class="form-group">
			{!! Form::button('Зберегти', ['class' => 'btn btn-success', 'type'=>'submit']) !!}
		</div>
					
	{!! Form::close() !!}
	</section>
@endsection