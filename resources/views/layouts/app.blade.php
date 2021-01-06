<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? 'Finding Bigfoot' }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('build/vendors~app.css') }}">
        <link rel="stylesheet" href="{{ asset('build/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>

    <nav class="navbar navbar-expand navbar-dark bg-dark ">
        <a class="navbar-brand" href="{{ route('sightings.index') }}">
            <img src="{{ asset('build/images/bigfoot.png') }}" width="25" height="30" class="d-inline-block align-top" alt="sasquatch">
            Sasquatch Sightings
        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('sightings.index') }}">Sightings</a>
            </li>

            <li class="nav-item mr-2">
                <a class="nav-link" href="{{ route('about') }}">About</a>
            </li>

            @if(Auth::check())
            <li class="nav-item">
                <a class="btn btn-outline-secondary nav-link" href="{{-- path('app_logout') --}}"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </li>
            @else
            <li class="nav-item">
                <a class="btn btn-outline-info my-2 my-sm-0 nav-link" href="{{-- path('app_login') --}}">Log In</a>
            </li>
            @endif
        </ul>

    </nav>

    <div class="container">
        <div class="row">
            <div class="col mb-5 top-nav">
                <h1 class="mt-5">Bigfoot is out there</h1>
            </div>
        </div>
        <div class="row">
            {{ $slot }}
        </div>
        <div class="row">
            <div class="col footer-nav">
                <p class="pt-4">Made with <span class="text-danger"><3</span> by the guys and gals at <u><a class="text-white" href="https://symfonycasts.com">SymfonyCasts</a></u></p>
                <p class="pt-4">Adapted for Laravel by the Blackfire team</p>
            </div>
        </div>
    </div>
        <script src="{{ asset('build/runtime.js') }}"></script>
        <script src="{{ asset('build/vendors~app.js') }}"></script>
        <script src="{{ asset('build/app.css') }}"></script>
    </body>
</html>
