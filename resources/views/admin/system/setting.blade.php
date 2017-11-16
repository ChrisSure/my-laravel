@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>Настройки</h1>
	{!! Breadcrumbs::render('adminSetting') !!}
</section>
<section class="content">
	<div class="box">
		<div class="box-body">
			{!! Form::open(['url' => route('setting'), 'method'=>'POST']) !!}
				<div class="form-group">
					{!! Form::label('title', 'Заголовок')   !!}
					{!! Form::text('title', $setting->title, ['class' => 'form-control', 'placeholder'=>'Введіть заголовок'])!!}
				</div>
				
				<div class="form-group">
					{!! Form::label('description', 'Опис')   !!}
					{!! Form::textarea('description', $setting->description, ['class' => 'form-control', 'rows' =>3, 'placeholder'=>'Введіть опис'])!!}
				</div>
				
				<div class="form-group">
					{!! Form::label('keywords', 'Ключові слова')   !!}
					{!! Form::textarea('keywords', $setting->keywords, ['class' => 'form-control', 'rows'=>3, 'placeholder'=>'Введіть ключові слова'])!!}
				</div>
				
				<div class="form-group">
					{!! Form::label('address', 'Адрес')   !!}
					{!! Form::text('address', $setting->address, ['class' => 'form-control', 'placeholder'=>'Введіть адрес'])!!}
				</div>
				
				<div class="form-group">
					{!! Form::label('phone', 'Телефон')   !!}
					{!! Form::text('phone', $setting->phone, ['class' => 'form-control', 'placeholder'=>'Введіть телефон'])!!}
				</div>
				
				<div class="form-group">
					{!! Form::label('email', 'Email')   !!}
					{!! Form::text('email', $setting->email, ['class' => 'form-control', 'placeholder'=>'Введіть email'])!!}
				</div>
				    
				<div class="form-group">
					{!! Form::button('Зберегти', ['class' => 'btn btn-success', 'type'=>'submit']) !!}
				</div>
			{!! Form::close() !!}	    
		</div>
	</div>
</section>
@endsection