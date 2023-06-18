<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  </head>
  <body class="min-h-screen flex items-center justify-center ">
    <div id="app">
      <nav class="navbar navbar-expand-md navbar-light bg-[#6da5c0] shadow-sm">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
          BMX: Inventory Management System
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
            </ul>
            <ul class="navbar-nav ms-auto">
              @guest
              @if (Route::has('login'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @endif
              @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
              @endguest
            </ul>
          </div>
        </div>
      </nav>
      <br>
      <div>
        <div class="image-container">
          <img src="{{ asset('assets/pictures/bmx.png') }}">
        </div>
        <main class="py-2">
          @yield('content')
        </main>
      </div>
    </div>
    <div class="custom-footer">&copy; 2023 System, Inc. All rights reserved. BMX Bike Parts Inventory Management System.</div>
  </body>
</html>