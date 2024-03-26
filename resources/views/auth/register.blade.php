@extends('layouts.login_layout')

@section('content')
    <div class="container my-form-container p-4">
        <div class="row justify-content-center">
            <div class="">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="my-input-container">
                        <div class="row justify-content-center text-cente">
                            {{-- TITLE --}}
                            <div class="text-center col-12">
                                <h2 class="my-blue"> Register </h2>
                            </div>

                            {{-- NAME INPUT --}}
                            <div class="col-12 my-3">
                                <div class=" position-relative ">
                                    <i class="fa-solid fa-user fa-lg"></i>
                                    <input id="name" type="text"
                                        class="my-input @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" placeholder="Name" autocomplete="name"
                                        autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- SURNAME INPUT --}}
                            <div class="col-12 my-3">
                                <div class=" position-relative ">
                                    <i class="fa-solid fa-user fa-lg"></i>
                                    <input id="surname" type="text"
                                        class="my-input @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" placeholder="Surname" autocomplete="surname"
                                        autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- DATE OF BIRTH --}}
                            <div class="row p-0 align-items-center ">
                                <label for="date_of_birth" class="col-12 col-md-4">Date of
                                    birth:</label>

                                <div class=" col-md-8 mt-2 my-mt-0 ">
                                    <input id="date_of_birth" type="date"
                                        class="my-input-normal @error('date_of_birth') is-invalid @enderror"
                                        name="date_of_birth" value="{{ old('date_of_birth') }}"
                                        autocomplete="date_of_birth" autofocus>

                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- EMAIL INPUT --}}
                            <div class="col-12 my-3">
                                <span class="min-text">( email is required )</span>
                                <div class="position-relative">
                                    <i class="fa-solid fa-envelope fa-lg"></i>
                                    <input id="email" type="email"
                                        class="my-input @error('email') is-invalid @enderror" name="email"
                                        placeholder="Email*" value="{{ old('email') }}" required autocomplete="email"
                                        autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- PASSWORD INPUT --}}
                            <div class="col-12 my-3">
                                <span class="min-text">( password is required )</span>
                                <div class=" position-relative ">
                                    <i class="fa-solid fa-lock fa-lg"></i>
                                    <input id="password" type="password"
                                        class="my-input
                                    @error('password') is-invalid @enderror"
                                        name="password" placeholder="Password*" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- PASSWORD CONFIRMATION --}}
                            <div class="col-12 my-3">
                                <div class="position-relative">
                                    <i class="fa-solid fa-lock fa-lg"></i>
                                    <input id="password-confirm" type="password" class="my-input"
                                        name="password_confirmation" placeholder="Confirm Password*" required
                                        autocomplete="new-password">
                                </div>
                            </div>


                            <div class="col-12 my-3">
                                <div class="text-center ">

                                    <button type="submit" class="my-btn-sm px-5">
                                        Register
                                    </button>

                                </div>
                            </div>

                            {{-- REGISTER BUTTON --}}
                            <div class="col-12 my-2">
                                <div class="text-center ">
                                    <p class="my-blue">
                                        You already have an account?
                                        <br>
                                        Login <a class="my-blue btn-link" href="{{ route('login') }}">Here</a>
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
