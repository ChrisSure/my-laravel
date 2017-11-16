@extends('layouts.admin')

@section('content')
	<section class="content-header">
	    <h1>Захист</h1>
	    {!! Breadcrumbs::render('adminSecurityIndex') !!}
	</section>
	<section class="content">
		<div class="box" style="padding-bottom: 20px;">
			<div class="box-body">
				<p style="float:left;"><a href="{{ route('securityAdd') }}" class="btn btn-primary">Додати</a></p>
				
					<div style="margin-left: 85px; width: 17%;">
						{!! Form::open(['url' => route('securityIndex'), 'method'=>'GET']) !!}
							<div class="form-group">
					            {!! Form::text('ip', old('ip') , ['class' => 'form-control', 'placeholder' => 'Введіть ip'])!!}
					        </div>
						{!! Form::close() !!}		
					</div>
					
				@if($security->isNotEmpty())
					<table class="table">
						<tr class="active"><td>IP</td><td>Дата блокування</td><td>Дія</td></tr>
						@foreach($security as $value)
							<tr>
								<td>{{ $value->ip }}</td>
								<td>{{ date('Y-m-d, h:i:s',$value->created_at) }}</td>
								<td>
									<a href="{{ route('securityView', ['id'=>$value->id]) }}">
										<i class="fa fa-eye" aria-hidden="true"></i>
									</a>&nbsp;&nbsp;
									<a href="{{ route('securityEdit', ['id'=>$value->id]) }}">
										<i class="fa fa-pencil" style="color:#2bce68" aria-hidden="true"></i>
									</a>&nbsp;&nbsp;
									<a href="{{ route('securityDelete', ['id'=>$value->id]) }}" class="delete">
										<i class="fa fa-trash" style="color:#ff6a6a;" aria-hidden="true"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</table>
					{{ $security->links() }}
				@else
					<p>Немає блокованих ip</p>
				@endif
			</div>
		</div>
	</section>
@endsection
