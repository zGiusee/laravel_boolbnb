@extends('layouts.payments')

@section('content')
    <div class="container rounded-4 py-3 position-relative">
        <div class="row justify-content-center mt-5">
            <div class="col-7 d-flex">
                {{-- PARTE SINISTRA --}}
                <div class="col-5 px-3 d-flex flex-column justify-content-between border border-end-0"
                    style="border-radius: 1rem 0 0 1rem;">
                    <div>
                        <h2 class="text-center mt-3">Checkout</h2>
                        <div class="text-center">Plan: {{ $subscription->name }}</div>
                    </div>
                    <div class="py-3">
                        <div class="text-center mb-2">{{ $apartment->title }}</div>
                        <img src="{{ $apartment->cover_img }}" alt="cover_img" class="img-fluid rounded-3">
                    </div>
                    <div class="text-center fs-1 mb-4">€ {{ $subscription->price }}</div>
                </div>

                {{-- PARTE DESTRA --}}
                <div class="col-7 border border-start-0" style="border-radius: 0 1rem 1rem 0; background-color: #DCDEE5">
                    <div class="px-3">
                        <h2 class="text-center my-3">Payment</h2>

                        <form
                            action="{{ route('user.payment', ['apartment' => $apartment, 'subscription' => $subscription]) }}"
                            method="post" id="payment-form">
                            @csrf
                            <div class="d-flex justify-content-center my-2">
                                <div class="form-group me-5">
                                    <label for="start_date" class="mb-2">Starting date</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date">
                                </div>

                                <div class="form-group">
                                    <label for="start_time" class="mb-2">Time</label>
                                    <input type="time" class="form-control" id="start_time" name="start_time">
                                </div>
                            </div>

                            <div id="dropin-container" class="col-12"></div>
                            <input id="nonce" name="payment_method_nonce" type="hidden" />
                            <input type="hidden" name="token" id="token" value="{{ $token }}" />

                            <div class="text-center m-4">
                                <button type="submit" id="submit-button"
                                    class="button button--small button--green text-uppercase">Purchase</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPT PER IL DROP UI --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.min.js"></script>
    <script>
        const form = document.getElementById('payment-form');
        const client_token = document.getElementById('token').value;

        braintree.dropin.create({
            authorization: client_token,
            container: '#dropin-container'
        }, (error, dropinInstance) => {
            if (error) console.error(error);

            form.addEventListener('submit', event => {
                event.preventDefault();

                dropinInstance.requestPaymentMethod((error, payload) => {
                    if (error) console.error(error);

                    document.querySelector('#nonce').value = payload.nonce;
                    form.submit();
                });
            });
        });
    </script>

    {{-- SCRIPT PER RECUPERARE L'ORA LOCALE --}}
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            var startTimeInput = document.getElementById('start_time');

            // Ottieni l'ora corrente
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();

            // Formatta l'ora in una stringa con il formato "HH:MM"
            var currentTime = (hours < 10 ? '0' : '') + hours + ':' + (minutes < 10 ? '0' : '') + minutes;

            // Imposta l'ora corrente come valore predefinito per l'input
            startTimeInput.value = currentTime;
        });
    </script>

    {{-- SCRIPT PER LA DATA --}}
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            var startDateInput = document.getElementById('start_date');

            // Ottieni la data odierna
            var now = new Date();
            var year = now.getFullYear();
            var month = (now.getMonth() + 1 < 10 ? '0' : '') + (now.getMonth() + 1);
            var day = (now.getDate() < 10 ? '0' : '') + now.getDate();

            // Formatta la data nel formato "YYYY-MM-DD"
            var currentDate = year + '-' + month + '-' + day;

            // Imposta la data odierna come valore predefinito per l'input
            startDateInput.value = currentDate;

            // Aggiungi un ascoltatore per l'evento di cambio dell'input di tipo "date"
            startDateInput.addEventListener('change', function() {
                // Ottieni la data selezionata dall'utente
                var selectedDate = new Date(startDateInput.value);
                var selectedYear = selectedDate.getFullYear();
                var selectedMonth = selectedDate.getMonth();
                var selectedDay = selectedDate.getDate();

                // Ottieni la data odierna
                var today = new Date();
                var todayYear = today.getFullYear();
                var todayMonth = today.getMonth();
                var todayDay = today.getDate();

                // Se la data selezionata è precedente a quella odierna, reimposta il valore all'odierno
                if (selectedYear < todayYear ||
                    (selectedYear === todayYear && selectedMonth < todayMonth) ||
                    (selectedYear === todayYear && selectedMonth === todayMonth && selectedDay < todayDay)
                ) {
                    startDateInput.value = currentDate;
                }
            });
        });
    </script>

    <style>
        .button {
            cursor: pointer;
            font-weight: 500;
            left: 3px;
            line-height: inherit;
            position: relative;
            text-decoration: none;
            text-align: center;
            border-style: solid;
            border-width: 1px;
            border-radius: 3px;
            -webkit-appearance: none;
            -moz-appearance: none;
            display: inline-block;
        }

        .button--small {
            padding: 10px 20px;
            font-size: 0.875rem;
        }

        .button--green {
            outline: none;
            background-color: rgba(81, 193, 255, 1);
            border-color: rgba(81, 193, 255, 1);
            color: white;
            transition: all 200ms ease;
        }

        .button--green:hover {
            background-color: white;
            color: rgba(81, 193, 255, 1);
        }
    </style>
@endsection
