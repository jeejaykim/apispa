<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{asset('images/logo.ico')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/icomoon.css')}}" rel="stylesheet">
	<link href="{{ asset('css/icofont.css')}}" rel="stylesheet">
	<link href="{{ asset('css/plugins.css')}}" rel="stylesheet">
	<link href="{{ asset('css/style.css')}}" rel="stylesheet">
	<link href="{{ asset('css/color.css')}}" rel="stylesheet">
	<link href="{{ asset('css/responsive.css')}}" rel="stylesheet">
	<link href="{{ asset('css/mystyle.css')}}" rel="stylesheet">

</head>
<body class="hb-home hb-homeone">
    <div id="app">
    	<div id="hb-wrapper" class="hb-wrapper hb-haslayout">
	        @include('layouts.header')
	       	<main id="hb-main" class="hb-main hb-haslayout">
	            @yield('content')
	        </main>
	        @include('layouts.footer')
    	</div>
    </div>

	@include('apispa.scripts')

</body>
</html>
