<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



{{--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">--}}
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/dist/css/adminlte.min.css') }}">


    <link href="{{ asset('/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/app.css') }}" rel="stylesheet">

    @yield('header')
</head>
<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        @include('groups.admin.layouts.components.header')
        <main>
            @include('groups.admin.layouts.components.aside')

            <div class="content-wrapper">

                @yield('breadcrumb')

                <section class="content">
                    <div class="container-fluid">
                        <div class="row ml-1">
                            @yield('content')
                        </div>
                    </div>
                </section>
            </div>
        </main>
        <footer> </footer>
    </div>



    <!-- jQuery -->
    <script src="{{ '/assets/plugins/jquery/jquery.min.js' }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('/assets/dist/js/adminlte.js') }}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('/assets/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/assets/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('/assets/dist/js/pages/dashboard3.js') }}"></script>

    <script src="{{ asset('/assets/js/app.js') }}" defer></script>
    @yield('footer')
</body>
</html>
