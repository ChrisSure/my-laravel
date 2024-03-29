@extends('layouts.admin')

@section('content')
	<section class="content-header">
	    <h1>Дозволи</h1>
	    {!! Breadcrumbs::render('adminPermIndex') !!}
	</section>
	<section class="content">
		<div class="box" style="padding-bottom: 20px;">
			<div class="box-body">
				<p style="float:left;"><a href="{{ route('permAdd') }}" class="btn btn-primary">Додати</a></p>
				
					<div style="margin-left: 85px; width: 17%;">
						{!! Form::open(['url' => route('permIndex'), 'method'=>'GET']) !!}
							<div class="form-group">
					            {!! Form::text('name', old('name') , ['class' => 'form-control', 'placeholder' => 'Введіть назву'])!!}
					        </div>
						{!! Form::close() !!}		
					</div>
					
				@if($perms->isNotEmpty())
					<table class="table">
						<tr class="active"><td>Назва</td><td>Дата добавлення</td><td>Дія</td></tr>
						@foreach($perms as $value)
							<tr>
								<td>{{ $value->name }}</td>
								<td>{{ $value->created_at }}</td>
								<td>
									<a href="{{ route('permView', ['id'=>$value->id]) }}">
										<i class="fa fa-eye" aria-hidden="true"></i>
									</a>&nbsp;&nbsp;
									<a href="{{ route('permEdit', ['id'=>$value->id]) }}">
										<i class="fa fa-pencil" style="color:#2bce68" aria-hidden="true"></i>
									</a>&nbsp;&nbsp;
									<a href="{{ route('permDelete', ['id'=>$value->id]) }}" class="delete">
										<i class="fa fa-trash" style="color:#ff6a6a;" aria-hidden="true"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</table>
					{{ $perms->links() }}
				@else
					<p>Немає дозволів</p>
				@endif
			</div>
		</div>
	</section>
@endsection
