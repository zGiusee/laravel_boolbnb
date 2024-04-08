@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            {{-- TITLE --}}
            <div class="col-12">
                <h1 class="my-title p-3">Apartments Statistic</h1>
            </div>

            <div class="col-6">
                <canvas id="myChartViews"></canvas>
            </div>
            <div class="col-6">
                <canvas id="myChartMess"></canvas>
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
