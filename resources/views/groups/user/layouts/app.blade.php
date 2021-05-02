<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link href="{{ asset('/assets/all/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets//user/css/app.css') }}" rel="stylesheet">

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

{{--    <script src="{{ asset('/assets/js/app.js') }}" defer></script>--}}
    @yield('footer')


    <script>
        // on-off aside

        setTimeout(() => {
            if (document.querySelector('.aside'))
            {
                const aside = document.querySelector('#aside');
                const btn = document.querySelector('#bar');

                btn.addEventListener('click', (e) =>
                {
                    e.preventDefault();
                    aside.classList.toggle('active');
                })

                const buttons = aside.querySelectorAll('.ui-nav-href');
                const contents = aside.querySelectorAll('.tab-pane')
                buttons.forEach( (btn,index) => {
                    btn.addEventListener('click', (e) => {
                        e.preventDefault();

                        contents.forEach(x => x.classList.remove('active'))
                        contents[index].classList.add('active')
                    })
                })
            }
        }, 500)

    </script>

</body>
</html>
