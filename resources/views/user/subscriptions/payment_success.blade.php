@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center m-5 ">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="160" height="160" fill="currentColor"
                        class="bi bi-check-circle" viewBox="0 0 16 16" style="color: green">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path
                            d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                    </svg>
                </div>
                <h1 class="m-5">
                    {{ $message }}
                </h1>
            </div>
        </div>
    </div>
    </div>
@endsection
