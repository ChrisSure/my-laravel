@extends('layouts.error')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			<h2>Помилка 404.  {{ $exception->getMessage() }}</h2>
			<a href="{{ URL::previous() }}">Повернутись</a
		</div>
	</div>
</div>
@endsection