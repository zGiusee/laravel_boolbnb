@extends('layouts.app')

@section('content')
    <div class="p-4">
        <a class="my-btn-sm" href="{{ route('user.apartment.index') }}"><i class="fas fa-arrow-left">
            </i></a>
    </div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 d-flex justify-content-center ">
                <div class="">
                    <div
                        class="py-3 px-3 d-flex justify-content-center my-blue text-uppercase fs-4 border-bottom border-info  ">
                        Payment failed!<br> 
                        {{ $errorString }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
