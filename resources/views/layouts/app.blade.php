<!doctype html>
<html lang="en" class="dark-theme">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name', 'Portolio') }}</title>

  <link rel="icon" href="{{asset('images/favicon-32x32.png')}}" type="image/png" />
  <!--plugins-->
  <link href="{{asset('plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
  <link href="{{asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/bootstrap-extended.css')}}" rel="stylesheet" />
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  <link href="{{asset('css/icons.css')}}" rel="stylesheet">
  <link href="{{asset('css/fonts.css')}}" rel="stylesheet">
  <link href="{{asset('css/bootstrap-icons.css')}}" rel="stylesheet">

  <!-- loader-->
  <link href="{{asset('css/pace.min.css')}}" rel="stylesheet" />


  <!--Theme Styles-->
  <link href="{{asset('css/dark-theme.css')}}" rel="stylesheet" />
  <link href="{{asset('css/header-colors.css')}}" rel="stylesheet" />
  <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet" type="text/css" />
  @stack('styles')
</head>

<body>

  <div class="wrapper">
    <!--start top header-->
    @include('partials.header')
       <!--end top header-->

       <!--start sidebar -->
        @include('partials.sidebar')
        <!--start sidebar -->

        <!--start content-->
      <main class="page-content">
        @yield('content')
      </main>

        
      </main>
   <!--end page main-->

  </div>


  <!--plugins-->
  <!-- Bootstrap bundle JS -->
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  <!--plugins-->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('plugins/simplebar/js/simplebar.min.js')}}"></script>
  <script src="{{asset('plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
  <script src="{{asset('js/pace.min.js')}}"></script>
  <script src="{{asset('plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
  <!--app-->
  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset('js/toastr.min.js')}}"></script>
  @include('partials.session_message')
  @stack('scripts')
</body>

</html>