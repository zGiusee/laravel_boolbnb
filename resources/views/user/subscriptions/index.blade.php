@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-title p-3 text-center">Choose your sponsor plan</h1>
            </div>

            <div class="col-12 d-flex justify-content-center py-5">

                @foreach ($subscriptions as $subscription)
                    <div class="pack-container mx-3 my-5">
                        <div class="header">
                            <p class="title fw-bold">
                                {{ $subscription->name }}
                            </p>
                            <div class="price-container">
                                <span>$</span>{{ $subscription->price }}
                                {{-- <span>/mo</span> --}}
                            </div>
                        </div>
                        <div>
                            <ul class="lists">
                                <li class="list">
                                    <span>
                                        <svg aria-hidden="true" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.5 12.75l6 6 9-13.5" stroke-linejoin="round" stroke-linecap="round">
                                            </path>
                                        </svg>
                                    </span>
                                    <p class="m-0">
                                        {{ $subscription->duration }} Hours
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="button-container">
                            <button type="button" class="my-btn-sm">
                                Buy
                            </button>
                        </div>
                        @foreach ($apartments as $apartment)
                            <li>
                                <a href="{{ route('user.selectSubscription', ['apartment' => $apartment, 'subscription' => $subscription]) }}"
                                    class="link-info text-decoration-none text-white">{{ $apartment->title }}</a>
                            </li>
                        @endforeach
                    </div>
                @endforeach



            </div>
        </div>
    </div>
@endsection
