@extends('layouts.admin')

@section('content')
	<section class="content-header">
	    <h1>Зміна пароля для - {{ $one['name'] }}</h1>
	    {!! Breadcrumbs::render('adminUserPassword', $one) !!}
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-body">
						{!! Form::open(['url' => route('userPassword', ['id'=>$one['id']]), 'method' => 'POST']) !!}
							<div class="form-group">
								{!! Form::label('password', 'Пароль')   !!}
								{!! Form::text('password', old('password'), ['class' => 'form-control', 'placeholder' => 'Введіть пароль'])!!}
							</div>
						    
						    <div class="form-group">
							    {!! Form::button('Зберегти', ['class' => 'btn btn-success', 'type'=>'submit']) !!}
							</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection