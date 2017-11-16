@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 style="text-align: center;">Congratulation !</h1>
        </div>
        {{ Widget::pages() }}
    </div>
    
    {{ Widget::category() }}
    
</div>
@endsection