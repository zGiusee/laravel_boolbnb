@extends('layouts.payments')

@section('content')
    <div class="container">
        <form action="{{ route('user.payment', ['apartment' => $apartment, 'subscription' => $subscription]) }}"
            method="post" id="payment-form" class="my-5">
            @csrf
            <input type="date" name="start_date" id="start_date">
            <input type="time" name="start_time" id="start_time">

            <div id="dropin-container" class="col-4"></div>
            <input id="nonce" name="payment_method_nonce" type="hidden" />
            <input type="hidden" name="token" id="token" value="{{ $token }}" />

            <div>
                <button type="submit" id="submit-button" class="button button--small button--green">Purchase</button>
            </div>
    </div>
    </form>
    </div>

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
            background-color: #64d18a;
            border-color: #64d18a;
            color: white;
            transition: all 200ms ease;
        }

        .button--green:hover {
            background-color: #8bdda8;
            color: white;
        }
    </style>
@endsection
