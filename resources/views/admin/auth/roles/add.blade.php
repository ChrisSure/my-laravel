@extends('layouts.admin')


@section('content')
	<section class="content-header">
	    <h1>Додати роль</h1>
	    {!! Breadcrumbs::render('adminRolesAdd') !!}
	</section>
	<section class="content">
	{!! Form::open(['url' => route('rolesAdd'), 'method'=>'POST']) !!}
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
				
			</div>
		</div>
			
		<div class="box">
			<div class="box-header with-border">Ролі</div>
			<div class="box-body">
				@foreach($perms as $value)
					<div class="form-group">
						{!! Form::label('perms', $value->name . ' (' . $value->description . ') ') !!}
						<input type="checkbox" value={{ $value->id }} name="perm[]" />
					</div>
				@endforeach
			</div>
		</div>
		
		<div class="form-group">
			{!! Form::button('Додати', ['class' => 'btn btn-success', 'type'=>'submit']) !!}
		</div>
	{!! Form::close() !!}
	</section>
@endsection