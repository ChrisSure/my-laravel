@extends('layouts.admin')

@section('content')
<section class="content-header">
	<h1>Інформація</h1>
	{!! Breadcrumbs::render('adminInfo') !!}
</section>
<section class="content">
	<div class="box">
		<div class="box-body">
			<table class="table">
				<tr>
					<td class="active">Назва сайту</td><td><?=env('APP_NAME')?></td>
				</tr>
				<tr>
					<td class="active">Середовище</td><td><?=env('APP_ENV')?></td>
				</tr>
				<tr>
					<td class="active">Debug режим</td><td><?= (env('APP_ENV')) ? 'Включений' : 'Виключений';?></td>
				</tr>
				<tr>
					<td class="active">Url адрес</td><td><?=env('APP_URL')?></td>
				</tr>
				<tr>
					<td class="active">Часова зона</td><td><?=env('APP_TIMEZONE')?></td>
				</tr>
				<tr>
					<td class="active">Мова</td><td><?=env('APP_LOCAL')?></td>
				</tr>
			</table>
		</div>
	</div>
</section>
@endsection