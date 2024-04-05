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

        return view('user.subscriptions.index', compact('sidebar_links'));
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

    public function plans()
    {
        $sidebar_links = config('sidebar_links');
        $user = Auth::user();
        $apartments = Apartment::where('user_id', $user->id)->get();

        $subscriptions = Subscription::all();
        return view('user.subscriptions.plans', compact('subscriptions', 'sidebar_links', 'apartments'));
    }
    public function payment_success()
    {
        $sidebar_links = config('sidebar_links');
        $message = 'Transazione avvenuta con successo!';
        return view('user.subscriptions.payment_success', compact('message', 'sidebar_links'));
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

        if ($result->success) {
            $transition = $result->transaction;

            if ($apartment->user_id == auth()->user()->id) {

                //controlliamo se esistono sponsorizzazioni
                if (!empty($apartment->subscriptions)) {
                    //cicliamo tutte le sponsorizzazioni
                    foreach ($apartment->subscriptions as $item) {
                        //controlliamo se la data di fine ancora deve terminare
                        $start_date = $form_data['start_date'] . ' ' . $form_data['start_time'] . ':00';
                        if ($start_date < $item->pivot->ending_time) {
                            //se è già presente una sponsor in corso, aumentiamo il tempo della sponsor
                            $hours = '+' . $subscription->duration . 'hours';
                            $end_date = date('Y-m-d H:i:s', strtotime($hours, strtotime($start_date)));
                            $item->pivot->ending_time = $end_date;
                            $item->pivot->subscription_id = $subscription->id;
                            $item->pivot->save();
                            /* 
                            $error_message = 'É già presente una sponsorizzazione che finisce in data: '.$item->pivot->end_date.' per l\'appartamento '.$apartment->title;
                            return redirect()->route('user.createSponsor', compact('apartment', 'sponsor'))->with('error_message', $error_message);
                            */
                            $message = 'hai aggiunto ' . $subscription->duration . ' ore alla sponsorizzazione';
                            return redirect()->route('user.subscription.plans', compact('apartment', 'subscription'))->with('message', $message);
                        }
                    }
                }
                //se siamo qui la sponsorizzazione pruò essere creata

                //recuperiamo la data di inizio
                $start_date = $form_data['start_date'] . ' ' . $form_data['start_time'] . ':00';
                //recuperiamo le ore dello sponsor
                $hours = '+' . $subscription->duration . 'hours';
                //imopostiamo la data di fine con le ore dello sponsor
                $end_date = date('Y-m-d H:i:s', strtotime($hours, strtotime($start_date)));
                //creiamo la relazione 
                $apartment->subscriptions()->attach($subscription, ['starting_time' => $start_date, 'ending_time' => $end_date]);
            } else {
                return view('errors.not_authorized');
            }
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ': ' . $error->message . '\n';
            }
            return back()->withErrors('Messaggio di errore: ' . $errorString);
        }

        // $message = 'Transazione avvenuta con successo!';
        // return redirect()->route('user.payment_success')->with('message', $message);
        return redirect()->route('user.payment_success');
    }
}
