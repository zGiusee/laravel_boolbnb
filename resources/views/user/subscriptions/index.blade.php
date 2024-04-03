@extends('layouts.app')

@section('content')
    <div>
        @foreach ($subscriptions as $subscription)
            <div>
                {{ $subscription->name }}
            </div>

            <div>
                {{ $subscription->price }}
            </div>

            @foreach ($apartments as $apartment)
                <li>
                    <a href="{{ route('user.selectSubscription', ['apartment' => $apartment, 'subscription' => $subscription]) }}"
                        class="link-info text-decoration-none">{{ $apartment->title }}</a>
                </li>
            @endforeach
        @endforeach
    </div>
@endsection
