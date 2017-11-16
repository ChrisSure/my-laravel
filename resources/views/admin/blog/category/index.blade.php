@extends('layouts.admin')

@section('content')
	<section class="content-header">
	    <h1>Категорії</h1>
	    {!! Breadcrumbs::render('adminCategoryIndex') !!}
	</section>
	<section class="content">
		<div class="box" style="padding-bottom: 20px;">
			<div class="box-body">
				<p style="float:left;"><a href="{{ route('categoryAdd') }}" class="btn btn-primary">Додати</a></p>
					<div style="margin-left: 80px; width: 20%;">
						{!! Form::open(['url' => route('categoryIndex'), 'method'=>'GET']) !!}
							<div class="form-group">
					            {!! Form::text('name', old('name') , ['class' => 'form-control', 'placeholder' => 'Введіть назву категорії'])!!}
					        </div>
						{!! Form::close() !!}		
					</div>
				@if($category->isNotEmpty())	
					<table class="table">
						<tr class="active">
							<td>Сортування</td><td>Назва категорія</td><td>Дата створення</td><td>Дата оновлення</td><td>Дія</td>
						</tr>
						<?
							$traverse = function ($categories, $prefix = '&nbsp;&nbsp;') use (&$traverse) {
						?>
							<? foreach($categories as $value): ?>
								<tr>
									<td>
										<a href="{{ route('categoryUp', ['id' => $value->id]) }}"><span class="glyphicon glyphicon-arrow-up"></span></a>&nbsp;&nbsp;
										<a href="{{ route('categoryDown', ['id' => $value->id]) }}"><span class="glyphicon glyphicon-arrow-down"></span></a>
									</td>
									<td>{{ $prefix . $value->name }}</td>
									<td>{{ $value->created_at }}</td>
									<td>{{ $value->updated_at }}</td>
									<td>
										<a href="{{ route('categoryView', ['id'=>$value->id]) }}">
											<i class="fa fa-eye" aria-hidden="true"></i>
										</a>&nbsp;&nbsp;
										<a href="{{ route('categoryEdit', ['id'=>$value->id]) }}">
											<i class="fa fa-pencil" style="color:#2bce68" aria-hidden="true"></i>
										</a>&nbsp;&nbsp;
										<a href="{{ route('categoryDelete', ['id'=>$value->id]) }}" class="delete">
											<i class="fa fa-trash" style="color:#ff6a6a;" aria-hidden="true"></i>
										</a>
									</td>
								</tr>
								<?$traverse($value->children, $prefix.'&nbsp;&nbsp;&nbsp;&nbsp;');?>
							<? endforeach; ?>
						<? 	
							};
							$traverse($category);
						?>
					</table>
				@else
					<p>Немає категорій</p>
				@endif
			</div>
		</div>
	</section>
@endsection
