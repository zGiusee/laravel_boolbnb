@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row row-gap-4">
            <div class="col-12">
                <h1>Your Sponsor</h1>
            </div>

            <div class="col-12">
                <div class="p-3 d-flex justify-content-between align-items-center">
                    <a class="my-btn-sm" href="{{ route('user.dashboard') }}"><i class="fas fa-arrow-left"></i></a>
                </div>
            </div>

            <div class="col-12">
                <table class="my-table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center"><i class="fas fa-heading my-icon-form me-2"></i>
                                Nome appartamento
                            </th>
                            <th scope="col" class="text-center"><i class="fa-regular fa-user my-icon-form me-2"></i>
                                Data inizio</th>
                            <th scope="col" class="text-center"><i class="fa-regular fa-user -alt my-icon-form me-2"></i>
                                Data fine</th>
                            <th scope="col" class="text-center"><i class="fas fa-pen my-icon-form me-2"></i>
                                Stato
                            </th>

                            <th scope="col" class="text-center"><i class="fas fa-tools my-icon-form me-2"></i> Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($apartments as $apartment)
                            @foreach ($apartment->subscriptions as $item)
                                <tr>
                                    <td>{{ $apartment->title }}</td>
                                    <td class="fw-bold">{{ $item->title }}</td>
                                    <td class="d-none d-lg-table-cell">{{ $item->pivot->start_date }}</td>
                                    <td class="d-none d-lg-table-cell">{{ $item->pivot->end_date }}</td>
                                    <td>
                                        @if (date('Y-m-d H:i:s') >= $item->pivot->start_date && date('Y-m-d H:i:s') <= $item->pivot->end_date)
                                            <span class="text-success fw-bold">in corso</span>
                                        @elseif (date('Y-m-d H:i:s') > $item->pivot->end_date)
                                            <span class=" fw-bold">finita</span>
                                        @else
                                            <span class=" fw-bold">da iniziare</span>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
