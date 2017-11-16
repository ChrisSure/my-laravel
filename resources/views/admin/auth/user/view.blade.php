@extends('layouts.admin')


@section('content')
	<section class="content-header">
	    <h1>Перегляд - {{ $user->name }}</h1>
	    {!! Breadcrumbs::render('adminUserView', $user) !!}
	</section>
	<section class="content">
		@if($user)
			<div class="box">
				<div class="box-body">
					<a href="{{ route('userEdit', ['id'=>$user->id]) }}" class="btn btn-primary">Редагувати</a>&nbsp;
					<a href="{{ route('userPassword', ['id'=>$user->id]) }}" class="btn btn-default" id="test_user_pass">Змінити пароль</a>&nbsp;
					<a href="{{ route('userDelete', ['id'=>$user->id]) }}" class="btn btn-danger delete" id="test_user_delete">Видалити</a>
					<hr/>
					<table class="table">
						<tr><td class="active">Назва</td><td>{{ $user->name }}</td></tr>
						<tr><td class="active">E-mail</td><td>{{ $user->email }}</td></tr>
						<tr>
							<td class="active">Роль</td>
							<td>{{ $user->roles->name }}</td>
						</tr>
						<tr>
							<td class="active">Статус</td>
							<td>
								@if($user->status == 1)
									Активний
								@else
									Неактивний
								@endif
							</td>
						</tr>
						<tr><td class="active">Дата створення</td><td>{{ $user->created_at }}</td></tr>
						<tr><td class="active">Дата оновлення</td><td>{{ $user->updated_at }}</td></tr>
					</table>
				</div>
			</div>	
		@else
			<p>Немає сторінок</p>
		@endif
	</section>
@endsection