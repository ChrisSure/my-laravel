<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Error</title>
    <link href="{{ asset('assets/css/error.css') }}" rel="stylesheet">
</head>
<body>
	<div class="top">
        @yield('content')
    </div>
</body>
</html>
