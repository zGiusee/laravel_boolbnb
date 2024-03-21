<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        {{-- HEADER --}}
        @include('user.partials.header')

        <main class="">
            <div class="display-flex">
                <div class="row">

                    {{-- SIDEBAR --}}
                    <div class="col-2 p-0">
                        <div class="sidebar">
                            <div class="sidebar_list">

                                @foreach ($sidebar_links as $link)
                                    <div
                                        class="{{ Route::currentRouteName() == $link['routeName'] ? 'my-bg-blue' : '' }} p-4">
                                        <a class="{{ Route::currentRouteName() == $link['routeName'] ? 'text-white' : '' }}"
                                            href="{{ route($link['routeName']) }}"><i class="{{ $link['icon'] }}"></i>
                                            {{ $link['label'] }}
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    {{-- MAIN CONTENT --}}
                    <div class="col-10">
                        <div class="main-content-container">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</body>

</html>
