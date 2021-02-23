<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link href="{{ asset('/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/app.css') }}" rel="stylesheet">

    @yield('header')
</head>
<body>

        @include('groups.user.layouts.components.header')
        <main id="app">
            <section>
                <div class="container">
                    <div class="d-flex">

                            @include('groups.user.layouts.components.aside')


                        @yield('content')
                    </div>
                </div>
            </section>
        </main>
        <footer> </footer>

    <script src="{{ asset('/assets/js/app.js') }}" defer></script>
    @yield('footer')
</body>
</html>
