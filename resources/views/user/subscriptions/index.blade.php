@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row row-gap-4">
            <div class="col-12">
                <h2>Sezione sponsor</h2>
                <p>Qui puoi scegliere il tipo di sponsorizzazione da assegnare al/ai tuo/tuoi appartamento/i. La
                    sponsorizzazione ti permetterà di comparire direttamente nella home page di <a
                        class="link-body-emphasis fw-bold text-decoration-none" href="http://localhost:5173/">BoolnBnB</a> e
                    di essere sempre tra i primi risultati nella ricerca di un appartamento situato nella tua zona!</p>
            </div>
            @foreach ($subscriptions as $subscription)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <h5 class="card-header bg-pink text-center text-white">
                            {{ $subscription->title }} </h5>
                        <div class="card-body text-center">
                            <h5 class="card-title"> Prezzo : <span class=" fw-bold">{{ $subscription->price }}€</span></h5>
                            <h5 class="card-title"> Durata : {{ $subscription->duration }}h</h5>
                            <ul class="list-unstyled ">
                                {{-- @foreach ($apartments as $apartment)
                                <li>
                                    <a href="{{ route('user.createSubscription', ['apartment' => $apartment, 'subscription' => $subscription]) }}"
                                        class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover">{{ $apartment->title }}</a>
                                </li>
                            @endforeach --}}
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <table class="table table-striped mt-4">
                <thead class="table-dark">
                    <tr>
                        <th>Nome appartamento</th>
                        <th>Sponsor</th>
                        <th class="d-none d-lg-table-cell">Data inizio</th>
                        <th class="d-none d-lg-table-cell">Data fine</th>
                        <th>Stato</th>
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
