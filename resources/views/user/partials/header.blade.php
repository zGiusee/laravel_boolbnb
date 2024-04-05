<header class="my-header">
    <div class="container-fluid">
        <div class="row">

            <div class="col-4 align-items-center d-flex">
                <a class="" href="{{ url('http://127.0.0.1:8000/user/dashboard') }}">
                    <div>
                        <img class="logo" src="{{ Vite::asset('resources/img/logo_1.png') }}" alt="">
                    </div>
                </a>
            </div>



            <div class="col-4 d-flex align-items-center justify-content-center">
                <!-- Left Side Of Navbar -->
                <ul class="">
                    <li class="">
                        <a href="{{ url('http://127.0.0.1:8000/user/dashboard') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}">B&B</a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}">Contact Us</a>
                    </li>
                </ul>
            </div>

            <div class="col-4 d-flex align-items-center justify-content-end">
                <!-- Right Side Of Navbar -->
                <ul class="">
                    <!-- Authentication Links -->
                    @guest
                        <li class="">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        {{-- <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right my-blue" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item my-blue" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li> --}}

                        <div>
                            <a class="text-white text-decoration-none" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </ul>
            </div>

        </div>
    </div>
</header>
