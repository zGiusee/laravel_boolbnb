<?php

namespace App\Http\Controllers\User;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Models\Apartment;
use Braintree\Gateway;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sidebar_links = config('sidebar_links');
        $user = Auth::user();
        $apartments = Apartment::where('user_id', $user->id)->get();

        $subscriptions = Subscription::all();
        return view('user.subscriptions.index', compact('subscriptions', 'sidebar_links', 'apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubscriptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriptionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubscriptionRequest  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubscriptionRequest $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }

    public function selectSubscription(Gateway $gateway, Apartment $apartment, Subscription $subscription)
    {
        $sidebar_links = config('sidebar_links');
        $token = $gateway->clientToken()->generate();
        return view('user.subscriptions.billing_info', compact('apartment', 'subscription', 'sidebar_links', 'token'));
    }
    public function payment(Request $request, Gateway $gateway, Apartment $apartment, Subscription $subscription)
    {
        $form_data = $request->all();

        $nonce = $form_data['payment_method_nonce'];

        $result = $gateway->transaction()->sale([
            'amount' => $subscription->price,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]

        ]);

        $transition = $result->transaction;


        return redirect()->route('user.subscription.index')->with('message', 'Sponsorizzazione avvenuta con successo');
    }
}
