@extends('layouts.admin')


@section('content')
	<section class="content-header">
	    <h1>Додати сторінку</h1>
	    {!! Breadcrumbs::render('adminSecurityAdd') !!}
	</section>
	<section class="content">
	{!! Form::open(['url' => route('securityAdd'), 'method'=>'POST']) !!}
		<div class="box">
			<div class="box-body">
			    <div class="form-group">
			        {!! Form::label('ip', 'IP') !!}
			        {!! Form::text('ip', old('ip'), ['class' => 'form-control', 'placeholder'=>'Введіть IP'])!!}
			    </div>
				
				<div class="form-group">
					{!! Form::button('Додати', ['class' => 'btn btn-success', 'type'=>'submit']) !!}
				</div>
			</div>
		</div>
	{!! Form::close() !!}
	</section>
@endsection