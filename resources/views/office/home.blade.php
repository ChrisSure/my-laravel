@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Вітаємо {{ Auth::user()->name }} !</div>
                <div class="panel-body">
                    В особистому кабінеті!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
