@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row row-gap-4 ">
            <div class="col-12">
                <h1>Your Sponsor</h1>
            </div>

            <div class="col-12">
                <div class="p-3 d-flex justify-content-between align-items-center">
                    <a class="my-btn-sm" href="{{ route('user.dashboard') }}"><i class="fas fa-arrow-left"></i></a>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-center">
                <table class="my-table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">
                                <i class="fas fa-heading my-icon-form me-2"></i>
                                Apartment Title
                            </th>
                            <th scope="col" class="text-center">
                                <i class="fa-solid fa-tag my-icon-form me-2"></i>
                                Subscription Name
                            </th>
                            <th scope="col" class="text-center">
                                <i class="fa-solid fa-dollar-sign my-icon-form me-2"></i>
                                Subscription Price
                            </th>
                            <th scope="col" class="text-center">
                                <i class="fa-regular fa-clock my-icon-form me-2"></i>
                                Starting Date
                            </th>
                            <th scope="col" class="text-center">
                                <i class="fa-regular fa-clock my-icon-form me-2"></i>
                                Ending Date
                            </th>
                            <th scope="col" class="text-center">
                                <i class="fas fa-pen my-icon-form me-2"></i>
                                State
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($apartments as $apartment)
                            <tr>
                                <td class="text-center"><a
                                        href="{{ route('user.apartment.show', ['apartment' => $apartment->slug]) }}">{{ $apartment->title }}</a>
                                </td>
                                <td>{{ $apartment->subscription_name }}</td>
                                <td>{{ $apartment->subscription_price }}</td>
                                <td>{{ $apartment->starting_time }}</td>
                                <td>{{ $apartment->ending_time }}</td>
                                <td>
                                    @if (date('Y-m-d H:i:s') < $apartment->ending_time)
                                        <span class="text-success fw-bold">Active</span>
                                    @elseif (date('Y-m-d H:i:s') > $apartment->ending_time)
                                        <span class=" fw-bold">Expired</span>
                                    @else
                                        <span class="text-success fw-bold">Active</span>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
