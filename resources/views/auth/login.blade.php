@extends('layouts.login_layout')

@section('content')
    <div class="container my-form-container">
        <div class="row justify-content-center">
            <div class="">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="my-input-container">
                        <div class="row justify-content-center text-cente">
                            {{-- TITLE --}}
                            <div class="text-center col-12">
                                <h2 class="my-blue"> Login </h2>
                            </div>

                            {{-- EMAIL INPUT --}}
                            <div class="col-8 my-3">
                                <div class="position-relative">
                                    <i class="fa-solid fa-envelope fa-lg"></i>
                                    <input id="email" type="email"
                                        class="my-input @error('email') is-invalid @enderror" name="email"
                                        placeholder="Email" value="{{ old('email') }}" required autocomplete="email"
                                        autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- PASSWORD INPUT --}}
                            <div class="col-8 my-3">
                                <div class=" position-relative ">
                                    <i class="fa-solid fa-lock fa-lg"></i>
                                    <input id="password" type="password"
                                        class="my-input
                                    @error('password') is-invalid @enderror"
                                        name="password" placeholder="Password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- REMEMBER INPUT --}}
                            <div class="col-7 my-3">

                                <div class="text-center">
                                    <label class="check_container d-flex justify-content-center align-items-center">

                                        <input checked="checked" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <div class="checkmark d-inline-block mx-3"></div>
                                        <div class="my-blue fs-6">Remember me</div>
                                    </label>

                                </div>

                            </div>

                            <div class="col-7 my-3">
                                <div class="text-center ">

                                    <button type="submit" class="my-btn-sm px-5">
                                        Login
                                    </button>

                                </div>
                            </div>

                            {{-- FORGOT YOUR PASSWORD REDIRECT --}}
                            <div class="col-7 my-2">
                                <div class="text-center ">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link my-blue" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    @endif

                                </div>
                            </div>

                            {{-- REGISTER BUTTON --}}
                            <div class="col-7 my-2">
                                <div class="text-center ">
                                    <p class="my-blue">
                                        You dont have an account?
                                        <br>
                                        Register <a class="my-blue btn-link" href="{{ route('register') }}">Here</a>
                                    </p>

                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
