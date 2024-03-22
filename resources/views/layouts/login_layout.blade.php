<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <main class="my-gradient-bg-blue min-vh-100 d-flex align-items-center justify-content-center">


            <div class="container">
                <div class="row justify-content-center ">

                    <div class="col-12 d-flex justify-content-center ">
                        <div class="login_logo_container">
                            <img src="{{ Vite::asset('resources/img/logo_2.png') }}" alt="">
                        </div>
                    </div>

                    <div class="col-6">
                        @yield('content')
                    </div>
                </div>
            </div>

        </main>
    </div>
</body>

</html>
