<!DOCTYPE HTML> 
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('fi/flaticon.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('tuner/css/colorpicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('tuner/css/styles.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.fancybox.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('rs-plugin/css/settings.css')}}" media="screen">
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
    <!--styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css')}}">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @yield('header')
</head>
<body style="background-color: #DCF9FA">