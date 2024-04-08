@extends('layouts.app')

@section('content') 


<div class="container-fluid position-relative my-success-container p-0 m-0 overflow-y-hidden">

        {{-- BACK BUTTON  --}}
        <div class="back-button p-0 m-0">
            <a class="my-btn-sm" href="{{ route('user.apartment.index') }}"><i class="fas fa-arrow-left">
                </i></a>
        </div>

        {{-- INFO SECTION  --}}
        <div class="row justify-content-center align-items-center height-100 p-0 m-0">
            <div class="col-12 d-flex justify-content-center">
                <div class="d-flex justify-content-center my-blue">
                </div>
                    <div class="d-flex justify-content-center my-blue text-uppercase fs-4 border-bottom border-info">
                    {{ $message }}
                    </div>
            </div>
        </div>
</div>

    
@endsection
