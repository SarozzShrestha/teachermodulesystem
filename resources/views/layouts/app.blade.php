<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- meta character set -->
        <meta charset="utf-8">
        <!-- IE compatibility meta -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('img/fav.png') }}">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta keyword -->
        <meta name="keywords" content="">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Teacher Module Management System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Stylesheets -->
        <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}">
        @yield('links')
        <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!--/ Scripts -->
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
        <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>

    </head>
    <body>
        @yield('content')
    </body>
</html>
