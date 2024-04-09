@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            {{-- TITLE --}}
            <div class="col-12">
                <h1 class="my-title my-3">Apartments Statistic</h1>
            </div>

            <div class="col-12 col-md-8 my-5">
                <h4>Views:</h4>
                <canvas id="myChartViews"></canvas>
            </div>
            <div class="col-12 col-md-8">
                <h4>Messages:</h4>
                <canvas id="myChartMess"></canvas>
            </div>

        </div>
    </div>

    <script>
        // Funzione per ottenere i nomi dei mesi degli ultimi 6 mesi in inglese
        function getLastSixMonths() {
            let lastSixMonths = [];
            for (let i = 5; i >= 0; i--) {
                let currentDate = new Date();
                currentDate.setMonth(currentDate.getMonth() - i);
                // Formatta la data per ottenere il nome del mese e lo aggiunge all'array
                lastSixMonths.push(currentDate.toLocaleString('en-US', {
                    month: 'long'
                }));
            }
            return lastSixMonths;
        }

        // Funzione per ottenere i dati dei messaggi o delle visualizzazioni negli ultimi 6 mesi
        function getDataLastSixMonths(data) {
            let dataInLastSixMonths = [0, 0, 0, 0, 0, 0];
            data.forEach(entry => {
                let monthIndex = new Date(entry.date).getMonth();
                dataInLastSixMonths[monthIndex] += 1;
            });
            return dataInLastSixMonths;
        }

        // Recupero i dati delle visualizzazioni dal backend e li memorizzo nella variabile "views"
        let views = {!! json_encode($views) !!};

        // Recupero i dati dei messaggi dal backend e li memorizzo nella variabile "messages"
        let messages = {!! json_encode($messages) !!};

        // Recupero l'elemento dal DOM per il grafico delle visualizzazioni
        const ctx = document.getElementById('myChartViews');

        // Recupero l'elemento dal DOM per il grafico dei messaggi
        const ctxM = document.getElementById('myChartMess');

        // Ottieni i nomi dei mesi degli ultimi 6 mesi
        let lastSixMonths = getLastSixMonths();

        // Ottieni i dati delle visualizzazioni negli ultimi 6 mesi
        let viewsInLastSixMonths = getDataLastSixMonths(views);

        // Ottieni i dati dei messaggi negli ultimi 6 mesi
        let messagesInLastSixMonths = getDataLastSixMonths(messages);

        // Crea un grafico a linee utilizzando Chart.js per il grafico delle visualizzazioni
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

        // Crea un grafico a linee utilizzando Chart.js per il grafico dei messaggi
        new Chart(ctxM, {
            type: 'line',
            data: {
                labels: lastSixMonths, // Utilizza i nomi dei mesi come etichette sull'asse delle x
                datasets: [{
                    label: 'Messages',
                    data: messagesInLastSixMonths, // Utilizza i conteggi dei messaggi come dati per il grafico
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
