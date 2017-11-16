@extends('layouts.admin')

@section('content')
	<section class="content-header">
	    <h1>Редагування - Дозвіл -> {{ $perm['name'] }}</h1>
	    {!! Breadcrumbs::render('adminPermEdit', $perm) !!}
	</section>
	<section class="content">
	{!! Form::open(['url' => route('permEdit', ['id'=>$perm['id']]), 'method'=>'POST']) !!}
		<div class="box">
			<div class="box-body">
				<div class="form-group">
					{!! Form::label('name', 'Назва')   !!}
					{!! Form::text('name', $perm['name'], ['class' => 'form-control', 'placeholder'=>'Введіть назву'])!!}
				</div>
				
				<div class="form-group">
					{!! Form::label('description', 'Опис')   !!}
					{!! Form::textarea('description', $perm['description'], ['class' => 'form-control', 'rows' => 3, 'placeholder'=>'Введіть назву'])!!}
				</div>
					
				<div class="form-group">
					{!! Form::button('Зберегти', ['class' => 'btn btn-success', 'type'=>'submit']) !!}
				</div>
			</div>
		</div>
	{!! Form::close() !!}
	</section>
@endsection