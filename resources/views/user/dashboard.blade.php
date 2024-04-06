@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <h2 class="fs-4 d-flex justify-content-center my-4 my-blue ">
        {{ __('Dashboard') }}
    </h2> --}}
        <div class="row justify-content-center align-items-center height-100">
            <div class="col-12 d-flex justify-content-center ">
                <div class="d-flex justify-content-center my-blue">
                    {{-- <h2 class="">{{ __('Dashboard') }}</h2> --}}
                </div>
                <div class=" w-25">
                    {{-- <div class="card-header">{{ __('User Dashboard') }}</div> --}}

                    <div
                        class="py-3 px-3 d-flex justify-content-center my-blue text-uppercase fs-4 border-bottom border-info  ">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
