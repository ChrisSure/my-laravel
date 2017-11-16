@extends('layouts.admin')

@section('content')
	<section class="content-header">
	    <h1>Сторінки</h1>
	    {!! Breadcrumbs::render('adminPagesIndex') !!}
	</section>
	<section class="content">
		<div class="box" style="padding-bottom: 20px;">
			<div class="box-body">
				<p style="float:left;"><a href="{{ route('pagesAdd') }}" class="btn btn-primary">Додати</a></p>
				
					<div class="dropdown" style="float: left;">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" 
						aria-expanded="true" style="margin-left: 10px;">
							Фільтр по статусу <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="margin-left: 10px;">
							<li role="presentation">
								<a role="menuitem" tabindex="-1" href="{{ route('pagesIndex') }}" style="font-weight: bold">Всі</a>
								<a role="menuitem" tabindex="-1" href="{{ route('pagesIndex', ['status' => 1, 'name' => $name]) }}" 
								style="font-weight: bold">Опубліковані</a>
								<a role="menuitem" tabindex="-1" href="{{ route('pagesIndex', ['status' => 2, 'name' => $name]) }}" 
								style="font-weight: bold">Чорновики</a>
							</li>
						</ul>
					</div>
					<div style="margin-left: 235px; width: 17%;">
						{!! Form::open(['url' => route('pagesIndex', ['status' => $status]), 'method'=>'GET']) !!}
							<div class="form-group">
					            {!! Form::text('name', old('name') , ['class' => 'form-control', 'placeholder' => 'Введіть назву сторінки'])!!}
					        </div>
						{!! Form::close() !!}		
					</div>
					
				@if($pages->isNotEmpty())
					<table class="table">
						<tr class="active"><td>Сортування</td><td>Назва сторінки</td><td>Дата створення</td><td>Дата оновлення</td><td>Статус</td><td>Дія</td></tr>
						@foreach($pages as $value)
							<tr>
								<td>
									<a href="{{ route('pagesUp', ['id' => $value->id]) }}"><span class="glyphicon glyphicon-arrow-up"></span></a>&nbsp;&nbsp;
									<a href="{{ route('pagesDown', ['id' => $value->id]) }}"><span class="glyphicon glyphicon-arrow-down"></span></a>
								</td>
								<td>{{ $value->name }}</td>
								<td>{{ $value->created_at }}</td>
								<td>{{ $value->updated_at }}</td>
								<td>{{ ($value->status) ? 'Опубліковано' : 'Чорновик' }}</td>
								<td>
									<a href="{{ route('pagesView', ['id'=>$value->id]) }}">
										<i class="fa fa-eye" aria-hidden="true"></i>
									</a>&nbsp;&nbsp;
									<a href="{{ route('pagesEdit', ['id'=>$value->id]) }}">
										<i class="fa fa-pencil" style="color:#2bce68" aria-hidden="true"></i>
									</a>&nbsp;&nbsp;
									<a href="{{ route('pagesDelete', ['id'=>$value->id]) }}" class="delete">
										<i class="fa fa-trash" style="color:#ff6a6a;" aria-hidden="true"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</table>
					{{ $pages->links() }}
				@else
					<p>Немає сторінок</p>
				@endif
			</div>
		</div>
	</section>
@endsection
