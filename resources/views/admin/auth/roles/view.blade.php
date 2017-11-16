@extends('layouts.admin')

@section('content')
	<section class="content-header">
	    <h1>Перегляд - Роль -> {{ $role->name }}</h1>
	    {!! Breadcrumbs::render('adminRolesView', $role) !!}
	</section>
	<section class="content">
		@if($role)
			<div class="box">
				<div class="box-body">
					<a href="{{ route('rolesEdit', ['id'=>$role->id]) }}" class="btn btn-primary">Редагувати</a>&nbsp;
					<a href="{{ route('rolesDelete', ['id'=>$role->id]) }}" class="btn btn-danger delete">Видалити</a>
					<hr/>
					<table class="table">
						<tr><td class="active">Назва</td><td>{{ $role->name }}</td></tr>
						<tr><td class="active">Опис</td><td>{{ $role->description }}</td></tr>
						<tr>
							<td class="active">Дозволи</td>
							<td>
								@if(count($perms) > 0)
									@foreach($perms as $value)
										<span class="label label-default">{{ $value->name }}</span>
									@endforeach
								@else
									<p>Немає дозволів</p>
								@endif
							</td>
						</tr>
						<tr><td class="active">Дата добавлення</td><td>{{ $role->created_at }}</td></tr>
						<tr><td class="active">Дата оновлення</td><td>{{ $role->updated_at }}</td></tr>
					</table>
				</div>
			</div>
		@else
			<p>Немає дозволу</p>
		@endif
	</section>
@endsection