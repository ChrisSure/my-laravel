@extends('layouts.admin')

@section('content')
	<section class="content-header">
	    <h1>Редагування - {{ $security['ip'] }}</h1>
	    {!! Breadcrumbs::render('adminSecurityEdit', $security) !!}
	</section>
	<section class="content">
	{!! Form::open(['url' => route('securityEdit', ['id'=>$security['id']]), 'method'=>'POST']) !!}
		<div class="box">
			<div class="box-body">
				<div class="form-group">
					{!! Form::label('ip','Назва')   !!}
					{!! Form::text('ip', $security['ip'], ['class' => 'form-control', 'placeholder'=>'Введіть IP'])!!}
				</div>
					
				<div class="form-group">
					{!! Form::button('Зберегти', ['class' => 'btn btn-success', 'type'=>'submit']) !!}
				</div>
			</div>
		</div>
	{!! Form::close() !!}
	</section>
@endsection