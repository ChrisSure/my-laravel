@extends('layouts.admin')

@section('content')
	<section class="content-header">
	    <h1>Сторінки</h1>
	    {!! Breadcrumbs::render('adminPagesIndex') !!}
	</section>
	<section class="content">
		<div class="box">
			<div class="box-body">
				<p style="float:left;"><a href="{{ route('userAdd') }}" class="btn btn-primary">Додати</a></p>

					<div class="dropdown" style="float: left;">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" 
						aria-expanded="true" style="margin-left: 10px;">
							Фільтр по статусу <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="margin-left: 10px;">
							<li role="presentation">
								<a role="menuitem" tabindex="-1" href="{{ route('userIndex', 
								['status' => 3, 'role' => $role, 'name' => $name]) }}" style="font-weight: bold">Всі</a>
								<a role="menuitem" tabindex="-1" href="{{ route('userIndex', 
								['status' => 1, 'role' => $role, 'name' => $name]) }}" style="font-weight: bold">Активний</a>
								<a role="menuitem" tabindex="-1" href="{{ route('userIndex', 
								['status' => 2, 'role' => $role, 'name' => $name]) }}" style="font-weight: bold">Неактивний</a>
							</li>
						</ul>
					</div>
					
					<div class="dropdown" style="float: left;">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" 
						aria-expanded="true" style="margin-left: 10px;">
							Фільтр по ролі <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="margin-left: 10px;">
							<li role="presentation">
								<a role="menuitem" tabindex="-1" href="{{ route('userIndex', ['status'=> $status, 'role' => -1, 'name' => $name]) }}" style="font-weight: bold">Всі</a>
								@if($roles)
									@foreach($roles as $value)
										<a role="menuitem" tabindex="-1" href="{{ route('userIndex', ['status'=> $status, 'role' => $value->id,
										  'name' => $name]) }}" style="font-weight: bold">{{ $value->name }}</a>
									@endforeach
								@endif
							</li>
						</ul>
					</div>
					
					<div style="margin-left: 375px; width: 30%;">
						{!! Form::open(['url' => route('userIndex', ['status'=> $status, 'role' => $role]), 'method'=>'GET']) !!}
							<div class="form-group">
					            {!! Form::text('name', old('name') , ['class' => 'form-control', 'placeholder' => 'Введіть ім\'я користувача '])!!}
					        </div>
						{!! Form::close() !!}		
					</div>
					
				@if($users->isNotEmpty())
					<table class="table">
						<tr class="active"><td>Назва</td><td>E-mail</td><td>Роль</td><td>Статус</td><td>Дата створення</td>
						<td>Дата оновлення</td><td>Дія</td></tr>
						@foreach($users as $value)
							<tr>
								<td>{{ $value->name }}</td>
								<td>{{ $value->email }}</td>
								<td>{{ $value->roles->name }}</td>
								<td>{{ ($value->status == 1) ? 'Активний' : 'Неактивний' }}</td>
								<td>{{ $value->created_at }}</td>
								<td>{{ $value->updated_at }}</td>
								<td>
									<a href="{{ route('userView', ['id'=>$value->id]) }}">
										<i class="fa fa-eye" aria-hidden="true"></i>
									</a>&nbsp;&nbsp;
									<a href="{{ route('userEdit', ['id'=>$value->id]) }}">
										<i class="fa fa-pencil" style="color:#2bce68" aria-hidden="true"></i>
									</a>&nbsp;&nbsp;
									<a href="{{ route('userPassword', ['id'=>$value->id]) }}">
										<i class="fa fa-unlock-alt" style="color:#766967" aria-hidden="true"></i>
									</a>&nbsp;&nbsp;
									<a href="{{ route('userDelete', ['id'=>$value->id]) }}" class="delete">
										<i class="fa fa-trash" style="color:#ff6a6a;" aria-hidden="true"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</table>
					{{ $users->links() }}
				@else
					<p>Немає користувачів</p>
				@endif
			</div>
		</div>
	</section>
@endsection
