<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BoolB&B</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('logo_tab.png') }}" />


    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Tomtom --}}
    <link rel="stylesheet" type="text/css"
        href="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css" />
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js">
    </script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js">
    </script>

    {{-- DATATABLE CSS --}}
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.3/datatables.min.css" rel="stylesheet">

    {{-- Chartjs --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
    @vite(['resources/js/table.js'])
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
                                        class="d-none d-md-block {{ Route::currentRouteName() == $link['routeName'] ? 'bg-white' : '' }} p-4">
                                        <a class="{{ Route::currentRouteName() == $link['routeName'] ? '' : 'text-white' }}"
                                            href="{{ route($link['routeName']) }}">
                                            <i class="{{ $link['icon'] }} px-lg-2 fs-lg-6 "></i>
                                            {{ $link['label'] }}
                                        </a>
                                    </div>

                                    <div
                                        class="d-md-none text-center {{ Route::currentRouteName() == $link['routeName'] ? 'bg-white' : '' }} p-4">
                                        <a class="{{ Route::currentRouteName() == $link['routeName'] ? '' : 'text-white' }}"
                                            href="{{ route($link['routeName']) }}">
                                            <i class="{{ $link['icon_list'] }}"></i>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    {{-- MAIN CONTENT --}}
                    <div class="col-10 p-0">
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
