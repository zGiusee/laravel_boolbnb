<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use App\Models\Subscription;
use Braintree\Gateway;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();
        $data = [
            "succes" => true,
            "token" => $token
        ];

        return response()->json($data, 200);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway)
    {

        // Definisco subscription
        $subscription = Subscription::find($request->subscription);

        $result = $gateway->transaction()->sale([
            "amount" => $subscription->price,
            "paymentMethodNonce" => $request->token,
            "options" => [
                "submitForSettlement" => true
            ]

        ]);

        if ($result->success) {

            $data = [
                "success" => true,
                "message" => "Bene"
            ];

            return response()->json($data, 200);
        } else {

            $data = [
                "success" => false,
                "message" => "Male",
            ];

            return response()->json($data, 401);
        }
        return "makePayment";
    }
}
