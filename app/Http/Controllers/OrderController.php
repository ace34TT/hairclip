<?php

namespace App\Http\Controllers;

use Error;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class OrderController extends Controller
{
    public function setCart(Request $request)
    {
    }
    public function pay()
    {
        $items = Cart::content();
        // dd(Cart::total());
        $lineItems = [];
        // foreach ($items as $key => $item) {
        //     $lineItems[] = [
        //         "price_data" => [
        //             'amount' => $item->price * $item->qty,
        //             'currency' => 'euro',
        //             'product_data' => [
        //                 "data" => $item->name
        //             ],
        //             "unit_amount" => $item->price
        //         ],
        //         "quantity" => $item->qty,
        //     ];
        // }
        try {
            // retrieve JSON from POST body
            // Create a PaymentIntent with amount and currency
            // dd(Cart::content());
            Stripe::setApiKey(env(key: "SK_STRIPE"));
            $paymentIntent = PaymentIntent::create([
                "amount" => 7 * 100,
                'currency' => 'eur',
            ]);
            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];
            return response()->json($output, 200);
        } catch (Error $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }
    public function success(Request $request)
    {
        $session = $request->query->all();
        dump($session);
        Stripe::setApiKey(env(key: "SK_STRIPE"));
        // $stripe = new \Stripe\StripeClient(
        //     env(key: "SK_STRIPE")
        // );
        // $stripe->paymentIntents->retrieve(
        //     $session["payment_intent"],
        //     []
        // );
        $paymentIntent = PaymentIntent::retrieve($session["payment_intent"],  ['expand' => ['payment_method']]);
        dd($paymentIntent);
        // echo "PaymentIntent ID: " . $paymentIntent->. "\n";
        // echo "Amount: " . $paymentIntent->amount . "\n";
        // echo "Currency: " . $paymentIntent->currency . "\n";
        // echo "Status: " . $paymentIntent->status . "\n";
    }
}
