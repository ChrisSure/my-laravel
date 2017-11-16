@extends('layouts.admin')

@section('content')
	<section class="content-header">
	    <h1>Редагування - Роль -> {{ $roles['name'] }}</h1>
	    {!! Breadcrumbs::render('adminRolesEdit', $roles) !!}
	</section>
	<section class="content">
	{!! Form::open(['url' => route('rolesEdit', ['id'=>$roles['id']]), 'method'=>'POST']) !!}
		<div class="box">
			<div class="box-body">
				<div class="form-group">
					{!! Form::label('name', 'Назва')   !!}
					{!! Form::text('name', $roles['name'], ['class' => 'form-control', 'placeholder'=>'Введіть назву'])!!}
				</div>
				
				<div class="form-group">
					{!! Form::label('description', 'Опис')   !!}
					{!! Form::textarea('description', $roles['description'], ['class' => 'form-control', 'rows' => 3, 'placeholder'=>'Введіть назву'])!!}
				</div>
			</div>
		</div>
		
		<div class="box">
			<div class="box-header with-border">Ролі</div>
			<div class="box-body">
				@if($roles['perm'])
					<? $array_perms = json_decode($roles['perm']);?>
					@foreach($perms as $value)
						<div class="form-group">
							{!! Form::label('perms', $value->name . ' (' . $value->description . ') ') !!}
							<input type="checkbox" value={{ $value->id }} name="perm[]" <? if(in_array($value->id, $array_perms)) echo "checked";?>/>
						</div>
					@endforeach
				@else
					@foreach($perms as $value)
						<div class="form-group">
							{!! Form::label('perms', $value->name . ' (' . $value->description . ') ') !!}
							<input type="checkbox" value={{ $value->id }} name="perm[]" />
						</div>
					@endforeach
				@endif
			</div>
		</div>
		
		<div class="form-group">
			{!! Form::button('Зберегти', ['class' => 'btn btn-success', 'type'=>'submit']) !!}
		</div>
	{!! Form::close() !!}
	</section>
@endsection