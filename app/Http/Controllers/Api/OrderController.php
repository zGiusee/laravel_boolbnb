<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use Braintree\Gateway;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function generate(OrderRequest $request, Gateway $gateway)
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

        $result = $gateway->transaction()->sale([
            "amount" => $request->amount,
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
                "success" => true,
                "message" => "Male",
            ];

            return response()->json($data, 401);
        }
        return "makePayment";
    }
}
