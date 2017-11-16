@extends('layouts.admin')


@section('content')
	<section class="content-header">
	    <h1>Додати дозвіл</h1>
	    {!! Breadcrumbs::render('adminPermAdd') !!}
	</section>
	<section class="content">
	{!! Form::open(['url' => route('permAdd'), 'method'=>'POST']) !!}
		<div class="box">
			<div class="box-body">
			    <div class="form-group">
			        {!! Form::label('name', 'Назва:') !!}
			        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder'=>'Введіть назву'])!!}
			    </div>
			    
			    <div class="form-group">
					{!! Form::label('description', 'Опис:') !!}
					{!! Form::textarea('description', old('description'), ['class' => 'form-control', 'rows' => 3, 'placeholder'=>'Введіть опис дозволу']) !!}
				</div>
				
				<div class="form-group">
					{!! Form::button('Додати', ['class' => 'btn btn-success', 'type'=>'submit']) !!}
				</div>
			</div>
		</div>
	{!! Form::close() !!}
	</section>
@endsection