<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('backend/demo/demo.css') }}" rel="stylesheet" />
        @stack('css')
</head>
<body>
    <div id="app">
    <div class="wrapper ">
    @if(Request::is('admin*'))
        @include('layouts.partial.sidebar')
    @endif
    <div class="main-panel" id="main-panel">
    
    @if(Request::is('admin*'))
        @include('layouts.partial.navbar')
    @endif
    <div class="panel-header panel-header-sm">
      </div>
      @yield('content')
      
    @if(Request::is('admin*'))
        @include('layouts.partial.footer')
    @endif
      
    </div>
    </div>
    </div>

     <!--   Core JS Files   -->
      <script src="{{ asset('backend/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{ asset('backend/js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('backend/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('backend/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('backend/demo/demo.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   

    @if(Session::has('record_added'))
        <script>
            swal("Greate job!","{!!Session::get('record_added')!!}","success",{
                button: "ok",
            });
        </script>
    @endif

    @if(Session::has('record_updated'))
        <script>
            swal("Greate job!","{!!Session::get('record_updated')!!}","success",{
                button: "ok",
            });
        </script>
    @endif

    @if(Session::has('record_deleted'))
        <script>
            swal("Greate job!","{!!Session::get('record_deleted')!!}","success",{
                button: "ok",
            });
        </script>
    @endif


    <script>
        $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        });}
  </script>
  
     @stack('scripts')

</body>
</html>
