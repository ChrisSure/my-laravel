@extends('layouts.admin')


@section('content')
	<section class="content-header">
	    <h1>Додати користувача</h1>
	    {!! Breadcrumbs::render('adminUserAdd') !!}
	</section>
	<section class="content">
		<div class="box">
			<div class="box-body">
				{!! Form::open(['url' => route('userAdd'), 'method'=>'POST']) !!}
			        
			        <div class="form-group">
			            {!! Form::label('name', 'Назва') !!}
			            {!! Form::text('name', old('name'), ['class' => 'form-control','placeholder'=>'Введіть назву'])!!}
			        </div>
			        
			        <div class="form-group">
						{!! Form::label('email', 'E-mail:',['class'=>'control-label']) !!}
						{!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder'=>'Введіть E-mail']) !!}
					</div>
					
					<div class="form-group">
			            {!! Form::label('password', 'Пароль') !!}
			            {!! Form::text('password',old('password'),['class' => 'form-control','placeholder'=>'Введіть пароль'])!!}
			        </div>
					
					<div class="form-group select">
						{!! Form::label('title', 'Роль') !!}
						{!! Form::select('role', $roles, null, ['class' => 'form-control']);!!}
					</div>
					
					<div class="form-group">
						{!! Form::label('status', 'Активувати:') !!}
						{!! Form::checkbox('status') !!}
					</div>
							    
					<div class="form-group">
						{!! Form::button('Додати', ['class' => 'btn btn-success','type'=>'submit']) !!}
					</div>
				{!! Form::close() !!}		
			</div>
		</div>
	</section>
@endsection