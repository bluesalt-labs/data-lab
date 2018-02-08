<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<link rel="shortcut icon" href="/favicon.ico" />-->

    <title>@yield('base-title') | {{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @yield('base-content')
</body>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('base-scripts')
</html>