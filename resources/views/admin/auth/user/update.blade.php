@extends('layouts.admin')

@section('content')
	<section class="content-header">
	    <h1>Редагування - {{ $user['name'] }}</h1>
	    {!! Breadcrumbs::render('adminUserEdit', $user) !!}
	</section>
	<section class="content">
		<div class="box">
			<div class="box-body">
				{!! Form::open(['url' => route('userEdit', ['id'=>$user['id']]), 'method'=>'POST']) !!}
					
					<div class="form-group">
						{!! Form::label('name','Назва')   !!}
						{!! Form::text('name', $user['name'], ['class' => 'form-control', 'placeholder'=>'Введіть назву'])!!}
					</div>
					
					<div class="form-group">
						{!! Form::label('email', 'Текст:') !!}
						{!! Form::text('email', $user['email'], ['class' => 'form-control', 'placeholder'=>'Введіть E-mail']) !!} 
					</div>
					
					<div class="form-group select">
						{!! Form::label('id_role', 'Роль') !!}
						{!! Form::select('id_role', $roles, $user['id_role'], ['class' => 'form-control']);!!}
					</div>

					<div class="form-group">
						{!! Form::label('status', 'Показати:') !!}
						<? if($user['status']):?>
							<input type="checkbox" value="1" name="status" checked=""/>
						<? else: ?>
							<input type="checkbox" value="1" name="status"/>
						<? endif; ?>
					</div>
				
					<div class="form-group">
						{!! Form::button('Зберегти', ['class' => 'btn btn-success', 'type'=>'submit']) !!}
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</section>
@endsection