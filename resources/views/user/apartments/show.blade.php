@extends('layouts.app')

@section('content')
    <div class="container back_color_gradient">
        <div class="row">
            <div class="col-8 py-5 px-5">
                <div class="">
                    <a class="my-btn-sm" href="{{ route('user.apartment.index') }}"><i class="fas fa-arrow-left">
                        </i></a>
                </div>

                <div class=" col-12 mt-5">
                    <div>
                        <h2 class="display-6 fw-bold">{{ $apartment->title }}</h2>
                    </div>
                </div>

                <div class="col-12">
                    @if (Str::contains($apartment->cover_img, 'https'))
                        <img class=" my-5 fit-img" src="{{ $apartment->cover_img }}" alt="{{ $apartment->title }}">
                    @else
                        <img class=" my-5 fit-img" src="{{ asset('/storage/' . $apartment->cover_img) }}"
                            alt="{{ $apartment->title }}">
                    @endif
                </div>

                <div class="container">
                    <div class="row mb-4 align-items-center">
                        <div class="col-lg-6 p-lg-6">

                            <div>
                                <p>Characteristics:</p>
                            </div>
                            <div>
                                <div>
                                    <div class="d-inline-flex">
                                        <div>
                                            <i class="fa-solid fa-question"></i>
                                        </div>

                                        <div class="ms-3 align-self-center">
                                            <p class="fw-bold">Services:</p>
                                            <ul class=" list-unstyled ">
                                                @forelse ($apartment->services as $service)
                                                    <li class="me-4"><i class=" {{ $service->icon }}"></i>
                                                        <span class=" d-inline-block ms-1 ">{{ $service->name }}</span>
                                                    </li>
                                                @empty
                                                    <li>Services not avaiable.</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <div class="d-inline-flex">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-geo-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.3 1.3 0 0 0-.37.265.3.3 0 0 0-.057.09V14l.002.008.016.033a.6.6 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.6.6 0 0 0 .146-.15l.015-.033L12 14v-.004a.3.3 0 0 0-.057-.09 1.3 1.3 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465s-2.462-.172-3.34-.465c-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411" />
                                        </svg>
                                    </div>

                                    <div class="ms-3 align-self-center">
                                        <p><strong>Address: </strong>{{ $apartment->address }}</p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="d-inline-flex">
                                    <div>
                                        <i class="fa-regular fa-square"></i>
                                    </div>

                                    <div class="ms-3 align-self-center">
                                        <p><strong>Square Meters: </strong>{{ $apartment->square_meters }} m²</p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="d-inline-flex">
                                    <div>
                                        <i class="fa-solid fa-bath"></i>
                                    </div>

                                    <div class="ms-3 align-self-center">
                                        <p><strong>Bathrooms: </strong>{{ $apartment->bathrooms }}</p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="d-inline-flex">
                                    <div>
                                        <i class="fa-solid fa-person-booth"></i>
                                    </div>

                                    <div class="ms-3 align-self-center">
                                        <p><strong>Rooms: </strong>{{ $apartment->rooms }}</p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="d-inline-flex">
                                    <div>
                                        <i class="fa-solid fa-bed"></i>
                                    </div>

                                    <div class="ms-3 align-self-center">
                                        <p><strong>Beds: </strong> {{ $apartment->beds }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-12">
                    <h1>Statistic</h1>
                </div>
                <div class="col-12 col-xxl-6 my-5">

                    <i>Views</i>
                    <div>
                        <canvas id="myChartViews"></canvas>
                    </div>


                </div>

                <div class="col-12 my-xxl-5 col-xxl-6">
                    <i>Messages</i>
                    <div>
                        <canvas id="myChartMess"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Recupero l'elemento dal dom 
            const ctx = document.getElementById('myChartViews');

            // Recupera i dati delle visualizzazioni dal backend e li memorizza nella variabile "views"
            let views = {!! json_encode($views) !!};
            console.log(views);

            // Crea un array contenente i nomi dei mesi degli ultimi 6 mesi
            let lastSixMonths = [];
            for (let i = 0; i < 6; i++) {
                let currentDate = new Date();
                currentDate.setMonth(currentDate.getMonth() - i);
                // Formatta la data per ottenere il nome del mese e lo aggiunge all'array
                lastSixMonths.push(currentDate.toLocaleString('default', {
                    month: 'long'
                }));
            }

            // Inizializzo un array per conteggiare le visualizzazioni per ciascun mese
            let viewsInLastSixMonths = [0, 0, 0, 0, 0, 0];

            // Itera su ciascuna visualizzazione e aggiorna il conteggio delle visualizzazioni per il mese corrispondente
            views.forEach(view => {
                let monthIndex = new Date(view.date).getMonth();
                viewsInLastSixMonths[monthIndex] += 1;
            });

            // Trasforma i numeri dei mesi nei loro nomi corrispondenti
            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ];
            lastSixMonths.forEach((month, i) => {
                lastSixMonths[i] = monthNames[i];
            });


            // Crea un grafico a linee utilizzando Chart.js con i dati ottenuti
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: lastSixMonths, // Utilizza i nomi dei mesi come etichette sull'asse delle x
                    datasets: [{
                        label: 'Views',
                        data: viewsInLastSixMonths, // Utilizza i conteggi delle visualizzazioni come dati per il grafico
                        fill: false,
                        borderColor: '#51c1ff',
                        tension: 0.1

                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>


        {{-- SCRIPT PER CHART MESSAGES  --}}
        <script>
            // Recupero l'elemento dal dom 
            const ctxM = document.getElementById('myChartMess');

            // Recupera i dati delle visualizzazioni dal backend e li memorizza nella variabile "views"
            let messages = {!! json_encode($messages) !!};


            // Crea un array contenente i nomi dei mesi degli ultimi 6 mesi
            let lastSixMonthsM = [];
            for (let i = 0; i < 6; i++) {
                let currentDateM = new Date();
                currentDateM.setMonth(currentDateM.getMonth() - i);
                // Formatta la data per ottenere il nome del mese e lo aggiunge all'array
                lastSixMonthsM.push(currentDateM.toLocaleString('default', {
                    month: 'long'
                }));
            }

            // Inizializzo un array per conteggiare le visualizzazioni per ciascun mese
            let messagesInLastSixMonths = [0, 0, 0, 0, 0, 0];

            // Itera su ciascuna visualizzazione e aggiorna il conteggio delle visualizzazioni per il mese corrispondente
            messages.forEach(view => {
                let monthIndexM = new Date(view.date).getMonth();
                messagesInLastSixMonths[monthIndexM] += 1;
            });

            // Trasforma i numeri dei mesi nei loro nomi corrispondenti
            const monthNamesM = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ];
            lastSixMonthsM.forEach((month, i) => {
                lastSixMonthsM[i] = monthNamesM[i];
            });

            // Crea un grafico a linee utilizzando Chart.js con i dati ottenuti
            new Chart(ctxM, {
                type: 'line',
                data: {
                    labels: lastSixMonthsM, // Utilizza i nomi dei mesi come etichette sull'asse delle x
                    datasets: [{
                        label: 'Messages',
                        data: messagesInLastSixMonths, // Utilizza i conteggi delle visualizzazioni come dati per il grafico
                        fill: false,
                        borderColor: '#51c1ff',
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endsection
