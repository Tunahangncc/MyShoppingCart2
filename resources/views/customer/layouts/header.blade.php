<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Tunahan Genç">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    <!-- CSS -->
    <link href="{{ asset('css/customer/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customer/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customer/style.css') }}" rel="stylesheet">

    @yield('css')

    <style>
        .btn-login {
            background: #f9bf29;
            border: 1px solid #f9bf29;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bolder;
            transition: 300ms ease-out;
        }

        .btn-login:hover {
            background: #f8b810;
            border-color: #f8b810;
        }
    </style>
</head>
<body>

@include('customer.components.navbar')

@yield('hero')
