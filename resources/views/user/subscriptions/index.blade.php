@extends('layouts.app')

@section('content')
    <div>
        @foreach ($subscriptions as $sub)
            <div>
                {{ $sub->name }}
            </div>

            <div>
                {{ $sub->price }}
            </div>

            <a href=""> Compra! </a>
        @endforeach
    </div>
@endsection
