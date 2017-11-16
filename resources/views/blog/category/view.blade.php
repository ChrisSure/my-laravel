@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			<h1>{{ $category->name }}</h1>
			<p>{!! $category->created_at !!}</p>
		</div>
	</div>
</div>
@endsection