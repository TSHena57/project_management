<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Trelloop') }}</title>

    <!-- Fonts -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('css/frontpage.css')}}" rel="stylesheet">
  <link href="{{asset('css/fonts.css')}}" rel="stylesheet">

    <!-- Scripts -->
</head>
<body>
    <header class="hero">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h1 class="display-6 fw-bold m-0"><i class="bi bi-kanban"></i> TrellooP</h1>
          <a href="{{auth()->check() ? route('dashboard') : route('login')}}" class="btn btn-light">{{auth()->check() ? 'Dashboard' : 'Login'}}</a>
        </div>
        <h1 class="display-4 fw-bold">Manage Projects Smarter</h1>
        <p class="lead">All-in-one solution to plan, track and manage your projects with ease.</p>
        <a href="#pricing" class="btn btn-light btn-lg mt-4">Get Started</a>
      </div>
    </header>

    @yield('content')

    <footer class="text-center">
        <div class="container">
          <p class="mb-2">©{{date('Y')}} Trelloop All rights reserved.</p>
        </div>
      </footer>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
