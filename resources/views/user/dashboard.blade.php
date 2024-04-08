@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            {{-- TITLE --}}
            <div class="col-12">
                <h1 class="my-title p-3">Apartments Statistic</h1>
            </div>

            <div class="col-6">
                <canvas id="myChart"></canvas>
            </div>
            <div class="col-6">
                <canvas id="myChart-2"></canvas>
            </div>

        </div>
    </div>

    <script>
        // Recupero l'elemento dal DOM per il primo grafico
        const ctx1 = document.getElementById('myChart');

        // Recupero i dati delle visualizzazioni dal backend e li memorizzo nella variabile "views"
        let views = {!! json_encode($views) !!};

        // Creo un array contenente i nomi dei mesi degli ultimi 6 mesi
        let lastSixMonths = [];
        for (let i = 0; i < 6; i++) {
            let currentDate = new Date();
            currentDate.setMonth(currentDate.getMonth() - i);
            // Formatta la data per ottenere il nome del mese e lo aggiunge all'array
            lastSixMonths.unshift(currentDate.toLocaleString('default', {
                month: 'long'
            }));
        }

        // Inizializzo un array per conteggiare le visualizzazioni per ciascun mese
        let viewsInLastSixMonths = Array(6).fill(0);

        // Itero su ciascuna visualizzazione e aggiorno il conteggio delle visualizzazioni per il mese corrispondente
        views.forEach(view => {
            let monthIndex = new Date(view.date).getMonth();
            viewsInLastSixMonths[monthIndex]++;
        });

        // Creo un grafico a linee utilizzando Chart.js con i dati ottenuti
        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: lastSixMonths,
                datasets: [{
                    label: 'Views',
                    data: viewsInLastSixMonths,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
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

    <script>
        // Recupero l'elemento dal DOM per il secondo grafico
        const ctx2 = document.getElementById('myChart-2');

        // Recupero i dati delle visualizzazioni dal backend e li memorizzo nella variabile "pageViews"
        let pageViews = {!! json_encode($views) !!};

        // Inizializzo un array per conteggiare le visualizzazioni per ciascun mese
        let pageViewsInLastSixMonths = Array(6).fill(0);

        // Itero su ciascuna visualizzazione e aggiorno il conteggio delle visualizzazioni per il mese corrispondente
        pageViews.forEach(pageView => {
            let monthIndex = new Date(pageView.date).getMonth();
            pageViewsInLastSixMonths[monthIndex]++;
        });

        // Creo un grafico a barre utilizzando Chart.js con i dati ottenuti
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: lastSixMonths, // Utilizzo lo stesso array di nomi dei mesi del primo grafico
                datasets: [{
                    label: 'All Views',
                    data: pageViewsInLastSixMonths,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgb(75, 192, 192)',
                    borderWidth: 1
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
