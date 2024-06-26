<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vikartr</title>
    <link rel="stylesheet" href="{{ asset('assets/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">


    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>

</head>

<body>
    <div class="push-top">
        @if(session()->has('completed'))
        <div class="alert alert-success">
            {{ session()->get('completed') }}
        </div>
        @endif

        <header>
            <nav class="navbar sticky-top navbar-expand-lg">


                <div class="container">
                    <a class="navbar-brand" href="{{ route('index')}}">
                        <img src="/assets/images/logo-new.svg" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto w-100 justify-content-end">
                            <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('index')}}"></a>
                    </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('services') }} ">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('portfolio') }}">portfolio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('blog') }}">blogs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('careers') }}">careers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contactus') }}">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Admin</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>